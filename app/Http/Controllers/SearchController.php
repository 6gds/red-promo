<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Service\Formatter\SearchFormatter;
use App\Service\SearchService;
use Illuminate\Http\JsonResponse;

/**
 * Контроллер для работы с поиском
 *
 * @author Gevorkyan Denis
 */
class SearchController extends Controller
{
    /**
     * Метод для поиска по категориям и продуктам
     *
     * @param SearchRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function searchCategoryAndWork(SearchRequest $request): JsonResponse
    {
        try {
            $request->authorize();

            $resultSearch = SearchService::searchCategoryAndWorkByQuery(
                $request->input('query'),
                $request->page ?? 1,
                $request->forPage ?? 20
            );

            $formattedData = (new SearchFormatter($resultSearch))->getFormatted();

            return response()->json([
                'status' => 'success',
                'message' => 'добавление прошло успешно',
                'data' => $formattedData
            ]);
        } catch (Exception $exception) {
            return response()->json([
                "status" => "error",
                "message" => $exception->getMessage()
            ]);
        }
    }
}
