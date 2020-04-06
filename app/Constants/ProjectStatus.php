<?php declare (strict_types = 1);

namespace App\Constants;

class ProjectStatus extends BaseConstant
{
    const PUBLISH   = 1;
    const UNPUBLISH = 0;

    public static function labels():  ? array
    {
        return [
            self::DRAFT   => "<span class='badge badge-draft'>Unpublish</span>",
            self::PUBLISH => "<span class='badge badge-publish'>Publish</span>",
        ];
    }
}
