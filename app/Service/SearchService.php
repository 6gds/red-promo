<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Category;
use App\Models\Work;
use Illuminate\Support\Collection;

class SearchService
{
    /**
     * Метод осуществляет поиск по категориям и продуктам
     *
     * @param string $query
     * @param int $page
     * @param int $forPage
     * @return Collection
     */
    public static function searchCategoryAndWorkByQuery(string $query, int $page = 1, int $forPage = 20): Collection
    {
        //Явно стоило бы использовать что-то типа elasticsearch
        $categories = Category::where('title', 'like', '%' . $query . '%')->get();
        $works = Work::where('title', 'like', '%' . $query . '%')->get();

        $result = $categories->concat($works)->sortBy('title')->forPage($page, $forPage);

        return $result;
    }
}
