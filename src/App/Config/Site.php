<?php

declare(strict_types=1);

namespace App\Config;

class Site
{

    const ROOT_URL = 'http://sst.cc';

    const SITE = [
        'siteName' => 'SST',
    ];

    const PUBLICVIEWS = __DIR__ . '/../../../public/views';

    const PUBLICIMAGES = __DIR__ . '/../../../public/assets/images';

    const APPVIEWS = __DIR__ . '/../views';

    public const PUBLICVIEW = __DIR__ . "/../../../public/views";
    public const SOURCE = __DIR__ . "/../../";
    public const ROOT = __DIR__ . "/../../../";
    public const STORAGE_UPLOADS = __DIR__ . "/../../../storage/uploads";

}
