<?php

declare(strict_types=1);

namespace App\Service\Formatter;

/**
 * Абстрактный класс форматтер
 *
 * @author Gevorkyan Denis
 */
abstract class Formatter
{
    protected $data;

    public function __construct($data)
    {
        if ($this->getType() == get_class($data)) {
            $this->data = $data;
        } else {
            throw new \Exception('Несоответствие типу');
        }
    }

    abstract function getFormatted();
    abstract function getType();
}
