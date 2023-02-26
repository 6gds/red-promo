<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\User;

/**
 * Класс для работы с бизнесс-логикой связанной со списком желания
 *
 * @author Gevorkyan Denis
 */
class WishlistService
{
    /**
     * Метод добавляет пользователю товар в спиок желаемого
     *
     * @param int $workId
     * @return void
     * @throws \Exception
     */
    public static function add(int $workId): void
    {
        $user = auth()->user();

        if (empty($user)) {
            throw new \Exception('Пользователь неавторизован');
        }

        if (!empty($user->wishProducts->where('id', $workId)->first())) {
            throw new \Exception('У пользователя уже есть заданный товар в списке желаемого');
        }

        $user->wishProducts()->attach($workId);
    }

    /**
     * Метод удаляет товар из списка желаемого для пользователя
     *
     * @param int $workId
     * @return void
     * @throws \Exception
     */
    public static function remove(int $workId): void
    {
        $user = auth()->user();

        if (empty($user)) {
            throw new \Exception('Пользователь неавторизован');
        }

        if (empty($user->wishProducts()->where('id', $workId))) {
            throw new \Exception('У пользователя нет заданного товара в списке желаемого');
        }

        $user->wishProducts()->detach($workId);
    }
}
