<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Service\CategoryService;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Контроллер для работ с категориями товаров
 *
 * @author Gevorkyan Denis
 */
class CategoryController extends Controller
{
    /**
     * Метод получает популярные категории и выводит их пользователю
     *
     * @return View
     */
    public function getPopular(): View
    {
        try {
            $categories = CategoryService::getPopularCategory();

            return view('pages.categories-popular', [
                'categories' => $categories
            ]);
        } catch (\Exception $exception) {
            return view('pages.error', ["error"=>$exception->getMessage()]);
        }
    }

    /**
     * Метод возвращает детальную страницу категории
     *
     * @param Request $request
     * @param int $id
     * @return View
     */
    public function page(Request $request, int $id): View
    {
        try {
            return view('pages.category', [
                'category' => Category::where('id', $id)->first()
            ]);
        } catch (\Exception $exception) {
            return view('pages.error', ["error"=>$exception->getMessage()]);
        }
    }
}
