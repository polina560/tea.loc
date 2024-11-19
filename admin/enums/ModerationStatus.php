<?php

namespace admin\enums;

use common\enums\DictionaryInterface;
use common\enums\DictionaryTrait;

enum ModerationStatus: int implements DictionaryInterface
{

    use DictionaryTrait;

    case moderation_new  = 0;
    case moderation_accepted  = 10;
    case moderation_rejected = 20;

    /**
     * {@inheritdoc}
     */
    public function description(): string
    {
        return match ($this) {
            self::moderation_new => 'MODERATION_NEW',
            self::moderation_accepted => 'MODERATION_ACCEPTED',
            self::moderation_rejected => 'MODERATION_REJECTED',
        };
    }

    /**
     * {@inheritdoc}
     */
    public function color(): string
    {
        return match ($this) {
            self::moderation_new => 'var(--bs-body-color)',
            self::moderation_accepted => 'var(--bs-success)',
            self::moderation_rejected => 'var(--bs-danger)',
        };
    }
}
