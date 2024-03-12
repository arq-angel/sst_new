<?php

declare(strict_types=1);

namespace Modules;

use App\Config\Site;

class TemplateEngine
{
    private static array $globalTemplateData = [];
    private static string $basePath;

    public static function init(string $basePath)
    {
        self::$basePath = $basePath;
    }

    public static function render(string $template, array $data = [])
    {
        self::addGlobal();

        extract($data, EXTR_SKIP);
        extract(self::$globalTemplateData, EXTR_SKIP);

        ob_start();

        include self::resolve($template);

        $output = ob_get_contents();

        ob_end_clean();

        return $output;
    }

    public static function resolve(string $path): bool|string
    {
        return self::$basePath . '/' . $path;
    }

    public static function addGlobal()
    {
        $siteName = Site::SITE['siteName'];
        self::$globalTemplateData['siteName'] = $siteName;
        self::$globalTemplateData['rootUrl'] = Site::ROOT_URL;
        self::$globalTemplateData['publicImagesDir'] = Site::PUBLICIMAGES;
    }
}
