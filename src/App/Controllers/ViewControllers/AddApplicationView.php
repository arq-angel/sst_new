<?php

declare(strict_types=1);

require_once __DIR__ ."/../modules/HelperWebsite.php";
require_once __DIR__ ."/../templates/CardView.php";

class AddApplicationView
{

    public static function createAddApplicationView(array $params)
    {

        $students = HelperWebsite::getViewRecord('students');

        echo CardView::getCardViews([
            'data' => $students
        ]);


    }

}
