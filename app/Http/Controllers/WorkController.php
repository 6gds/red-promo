<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Work;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Контроллер для работы с товарами
 *
 * @author Gevorkyan Denis
 */
class WorkController extends Controller
{
    /**
     * Метод возвращает детальную страницу для продукта
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function page($id): View
    {
        try {
            $data = [
                "work" => Work::getActive()->where('id', $id)->first()
            ];

            $user = auth()->user();

            if (!empty($user) && !empty($user->wishProducts->where('id', $data['work']->id)->first())) {
                $data['inWishlist'] = true;
            }

            return view('pages.work', $data);
        } catch (\Exception $exception) {
            return view('pages.error', ["error"=>$exception->getMessage()]);
        }
    }

    /**
     * Метод для вывода страницы со всеми продуктами
     *
     * @return View
     */
    public function all(): View
    {
        return view('pages.works', [
            "works" => Work::getActiveSorted(),
            "categories" => Category::getActiveSorted()
        ]);
    }
}
