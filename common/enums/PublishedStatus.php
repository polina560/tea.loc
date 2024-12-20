<?php

namespace common\enums;

enum PublishedStatus: int implements DictionaryInterface
{

    use DictionaryTrait;

    case published_yes  = 10;
    case published_no  = 0;

    /**
     * {@inheritdoc}
     */
    public function description(): string
    {
        return match ($this) {
            self::published_yes => 'Опубликовано',
            self::published_no => 'Скрыто',
        };
    }

    /**
     * {@inheritdoc}
     */
    public function color(): string
    {
        return match ($this) {
            self::published_yes => 'var(--bs-success)',
            self::published_no => 'var(--bs-danger)',
        };
    }
}
