<?php

declare(strict_types=1);

namespace App\Controllers\ViewControllers;

use App\Config\Fields;
use Modules\HelperWebsite;

class AllView
{

    public static function createAllView(array $params)
    {



//        dd($params);
        $pageName = $params['pageName'];
        $allRecords = $params['data'];


//        dd($allRecords);

        if (array_key_exists($pageName, Fields::FIELD)) {

            $tableHtml = '<div class="container">';
            $tableHtml .= '<table class="table table-striped table-hover">';
            $tableHtml .= '<thead>';
            $tableHtml .= '<tr>';

            // Create table header based on field labels
            foreach (Fields::FIELD[$pageName] as $value) {
                $tableHtml .= '<th>' . $value['label'] . '</th>';
            }

//            $tableHtml .= '<th>Actions</th>'; // Add a column for actions (edit, delete, etc.)
            $tableHtml .= '</tr>';
            $tableHtml .= '</thead>';
            $tableHtml .= '<tbody>';

            // Populate table rows with data
            foreach ($allRecords as $record) {

                $tableHtml .= '<tr>';
                foreach (Fields::FIELD[$pageName] as $key => $value) {

                    if (array_key_exists($key, Fields::NAMEASSOC)) {

                        // here $key ~ colleges || courses || students from FIELD array
                        $fieldId = Fields::NAMEASSOC[$key]['fieldId'];
                        $fieldName = Fields::NAMEASSOC[$key]['fieldName'];

                        //Different controller based on the id identifier from IDS array used to get data of that controller
                        // to fill the dropdown selection
                        $eachController = Fields::NAMEASSOC[$key]['controller'];

                        $idValue = $record[$fieldId];

                        $data = HelperWebsite::getEachRecord($eachController, $idValue);

                        $eachRecord = $data['result'];

//                        dd($eachRecord);

                        if (count($eachRecord) !== 0) {
                            foreach ($eachRecord as $eachField) {
                                if (isset($eachField[$fieldName])) {
                                    $name = $eachField[$fieldName];

                                    $tableHtml .= '<td>' . $name . '</td>';
                                } else {
                                    $tableHtml .= '<td></td>';
                                }
                            }
                        } else {
                            $tableHtml .= '<td></td>';
                        }


                    } else {
                        $tableHtml .= '<td>' . (($record[$key]) ?? '') . '</td>';
                    }

                }
                // Add action buttons (edit, delete, etc.) - Replace '#' with appropriate URLs
//                $tableHtml .= '<td><a href="#">Edit</a> | <a href="#">Delete</a></td>';
                $tableHtml .= '</tr>';
            }

            $tableHtml .= '</tbody>';
            $tableHtml .= '</table>';
            $tableHtml .= '</div>';



            return $tableHtml;
        }

        return 'Form does not exist in the FIELD';
    }

}
