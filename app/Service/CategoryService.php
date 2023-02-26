<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Класс предназначенный для работы с бизнесс-логикой связанной с категориями
 *
 * @authro Gevorkyan Denis
 */
class CategoryService
{
    /**
     * Возвращает список самых популярных категорий
     *
     * @param int $forPage
     * @return Collection
     */
    public static function getPopularCategory(int $forPage = 3): Collection
    {
        $popularCategories = Category::whereIn('id', function ($query) use ($forPage) {
            $query->select('id')
                ->from(function ($query) use ($forPage) {
                    $query->from('categories')
                        ->join('works_categories', 'categories.id', '=', 'works_categories.category_id')
                        ->join('works', 'works.id', '=', 'works_categories.work_id')
                        ->join('work_reviews', 'work_reviews.work_id', '=', 'works.id')
                        ->groupBy('categories.id')
                        ->select(DB::raw('count(works_categories.id) as totalReview, categories.id as id'))
                        ->orderBy('totalReview')
                        ->limit($forPage)
                        ->get();
                });
        })->get();

        return $popularCategories;
    }
}
