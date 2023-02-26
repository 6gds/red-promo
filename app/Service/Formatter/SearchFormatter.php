<?php

declare(strict_types=1);

namespace App\Service\Formatter;

use App\Models\Work;
use Illuminate\Database\Eloquent\Collection;

/**
 * Форматтер для данных получаемых с поискового запроса
 *
 * @author Gevorkyan Denis
 */
class SearchFormatter extends Formatter
{
    /**
     * Тип который должен прийти в конструктор
     *
     * @return string
     */
    public function getType()
    {
        return Collection::class;
    }

    /**
     * Метод форматтирует данные
     *
     * @return array
     */
    public function getFormatted(): array
    {
        $collection = $this->data;
        $formattedData = [];

        $collection->map(function ($item, $key) use (&$formattedData) {
            $formattedData[] = [
                "title" => $item->title,
                "url" => get_class($item) == Work::class ? route('work.page', $item->id) : route ('category.page', $item->id),
            ];
        });

        return $formattedData;
    }
}
