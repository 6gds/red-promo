<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Service\PaymentService;
use Illuminate\Http\Request;
use App\Enums\PaymentStatusEnum;
use App\Models\Work;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\NotificationEventType;

use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function index(){
        return view('payment.index', [
            "transactions"=>Transaction::all()
        ]);
    }

    public function create(Request $request, PaymentService $service, $id){
        $amount = (float) Work::find($id)->amount;
        // (float) $request->input('amount');
        $descr = "Оплата товара";
        $email = $request->input('email');
        $work_id = $id;

        $transaction = Transaction::create([
            'amount'=>$amount,
            'descr'=>$descr,
            'work_id'=>$work_id,
            'email'=>$email,
            'status'=>"CREATED"
        ]);

        if ($transaction){
            $transaction_id = $transaction->id;

            $options = [
                "work_id"=>$work_id,
                "transaction_id"=>$transaction_id,
            ];

            $link = $service->createPayment($amount, $descr, $options);

            // redirect()->away($link)
            return response()->json([
                'status'=>'success',
                'link'=>$link
            ]);
        }
        else{return response()->json([
            'status'=>'error'
        ]);}
    }

    public function callback(Request $request, PaymentService $service){
        $source = file_get_contents('php://input');
        $requestBody = json_decode($source, true);

        $notification = ($requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
            ? new NotificationSucceeded($requestBody)
            : new NotificationWaitingForCapture($requestBody);
        $payment = $notification->getObject();

        Log::info(json_encode($payment));

        if (isset($payment->status) && $payment->status=="waiting_for_capture"){
            $service->getClient()->capturePayment([
                'amount' => $payment->amount,
            ], $payment->id, uniqid('', true));
        }

        if (isset($payment->status) && $payment->status=="succeeded"){
            if ((bool)$payment->paid===true){
                $metadata = (object)$payment->metadata;
                if (isset($metadata->transaction_id)){
                    $transaction_id = $metadata->transaction_id;
                    $transaction = Transaction::find($transaction_id);
                    $transaction->status = PaymentStatusEnum::CONFIRMED;
                    $transaction->save();

                    if (cache()->has('amount')){
                        cache()->forever('balance', (float)cache()->get('balance') + (float)$payment->amount->value);
                    }else {
                        cache()->forever('balance', (float)$payment->amount->value);
                    }
                }
            }
        }
    }
}
