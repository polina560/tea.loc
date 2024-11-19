<?php

namespace common\models;

class ModerationStatus
{

    public const moderation_new  = 0;
    public const moderation_accepted  = 10;
    public const moderation_rejected = 20;


    public function getConstants()
    {
        return array(
            self::moderation_new=>"MODERATION_NEW",
            self::moderation_accepted=>"MODERATION_ACCEPTED",
            self::moderation_rejected=>"MODERATION_REJECTED"
        );
    }


    public function getStatusName($id)
    {
        if($id == self::moderation_new)
            return "MODERATION_NEW";
        if($id == self::moderation_accepted)
            return "MODERATION_ACCEPTED";
        if($id == self::moderation_rejected)
            return "MODERATION_REJECTED";
    }
}
