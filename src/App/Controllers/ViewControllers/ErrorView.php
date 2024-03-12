<?php

declare(strict_types=1);

class ErrorView
{

    public static function createErrorView(array $errors)
    {

        return $errors['error'];

    }

}
