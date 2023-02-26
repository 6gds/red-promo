<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\ReviewImage;
use App\Models\Work;
use App\Models\WorkReview;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Контроллер для работы с отзывами
 *
 * @author Gevorkyan Denis
 */
class ReviewController extends Controller
{
    /**
     * Метод добавляет отзыв в систему
     *
     * @param ReviewRequest $request
     * @param int $workId
     * @return JsonResponse
     */
    public function add(ReviewRequest $request, int $workId): JsonResponse
    {
        try {
            $request->authorize();

            $user = auth()->user();

            if (empty($user)) {
                throw new Exception('Пользователь неавторизован');
            }

            $review = WorkReview::create([
                "user_id" => $user->id,
                "work_id" => $workId,
                "text" => $request->message,
            ]);

            if ($request->TotalImages > 0) {
                for ($x = 0; $x < $request->TotalImages; $x++) {
                    if ($request->hasFile('images' . $x)) {
                        $file = $request->file('images' . $x);

                        $path = $file->store('public/images');
                        $name = $file->getClientOriginalName();

                        $insert[$x]['name'] = $name;
                        $insert[$x]['path'] = $path;

                        ReviewImage::create([
                            'review_id' => $review->id,
                            'filename' => $name,
                            'path' => $path
                        ]);
                    }
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'добавление прошло успешно',
                'data' => view('partials.work.reviews', [
                    "work" => Work::where('id', $workId)->first()
                ])->render(),
            ]);
        } catch (Exception $exception) {
            return response()->json([
                "status" => "error",
                "message" => $exception->getMessage()
            ]);
        }
    }
}
