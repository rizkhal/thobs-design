<?php declare (strict_types = 1);

namespace App\Constants;

class CorauselStatus extends BaseConstant
{
    const ISCORAUSEL    = 1;
    const ISNOTCORAUSEL = 0;

    public static function labels():  ? array
    {
        return [
            self::ISCORAUSEL    => "<span class='badge badge-draft'>corausel</span>",
            self::ISNOTCORAUSEL => "<span class='badge badge-publish'>not corausel</span>",
        ];
    }
}
