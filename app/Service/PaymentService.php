<?php

    namespace App\Service;
    use YooKassa\Client;

    class PaymentService{
        public function getClient(): Client
        {
            $client = new Client();
            $client->setAuth(config('services.yookassa.shop_id'), config('services.yookassa.secret_key'));

            return $client;
        }

        public function createPayment(float $amount, string $desc, array $options = []){
            $client = $this->getClient();

            $response = $client->createPayment(
                array(
                    'amount' => array(
                        'value' =>  $amount,
                        'currency' => 'RUB',
                    ),
                    'capture' => false,
                    'metadata' =>[
                        "transaction_id"=>$options['transaction_id'],
                        "work_id"=>$options['work_id'],
                    ],
                    'payment_method_data' => array(
                        'type' => 'bank_card',
                    ),
                    'confirmation' => array(
                        'type' => 'redirect',
                        'return_url' => route('work.page', $options['work_id']),
                    ),
                    'description' => $desc,
                ), uniqid('', true),
            );

            return $response->getConfirmation()->getConfirmationUrl();
        }
    }
?>
