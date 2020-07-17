<?php

declare (strict_types = 1);

namespace App\Constants;

class Platform extends BaseConstant
{
    const FACEBOOK  = 1;
    const INSTAGRAM = 2;
    const WHATSAPP  = 3;
    const TWITTER   = 4;
    const TELEGRAM  = 5;
    const GITHUB    = 6;
    const YOUTUBE   = 7;

    public static function labels(): array
    {
        return [
            self::FACEBOOK  => "FACEBOOK",
            self::INSTAGRAM => "INSTAGRAM",
            self::WHATSAPP  => "WHATSAPP",
            self::TWITTER   => "TWITTER",
            self::TELEGRAM  => "TELEGRAM",
            self::GITHUB    => "GITHUB",
            self::YOUTUBE   => "YOUTUBE",
        ];
    }
}
