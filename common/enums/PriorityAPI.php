<?php

namespace common\enums;

enum PriorityAPI: int implements DictionaryInterface
{

    use DictionaryTrait;

    case first = 0;
    case second = 10;


    /**
     * {@inheritdoc}
     */
    public function description(): string
    {
        return match ($this) {
            self::first => 'Первый',
            self::second => 'Второй',
        };
    }

    /**
     * {@inheritdoc}
     */
    public function color(): string
    {
        return match ($this) {
            self::first => 'var(--bs-body-color)',
            self::second => 'var(--bs-body-color)',
        };
    }

}
