<?php

namespace App\Http\Controllers;

use App\Http\Requests\WishRequest;
use App\Service\WishlistService;
use Illuminate\Http\JsonResponse;

/**
 * Контреллер для работы с списком желаний пользователя
 *
 * @author Gevorkyan Denis
 */
class WishlistController extends Controller
{
    /**
     * Метод добавляет продукт в список желания пользователя
     *
     * @param WishRequest $request
     * @return JsonResponse
     */
    public function add(WishRequest $request): JsonResponse
    {
        try {
            $request->authorize();
            $data = $request->validated();

            WishlistService::add($data['work']);

            return response()->json([
                'status' => 'success',
                'message' => 'добавление прошло успешно'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => "error",
                "message" => $exception->getMessage()
            ]);
        }
    }

    /**
     * Метод удаляет продукт из списка желания пользователя
     *
     * @param WishRequest $request
     * @return JsonResponse
     */
    public function remove(WishRequest $request): JsonResponse
    {
        try {
            $request->authorize();
            $data = $request->validated();

            WishlistService::remove($data['work']);

            return response()->json([
                'status' => 'success',
                'message' => 'удаление прошло успешно'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "status" => "error",
                "message" => $exception->getMessage()
            ]);
        }
    }
}
