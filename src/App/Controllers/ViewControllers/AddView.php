<?php

declare(strict_types=1);

namespace App\Controllers\ViewControllers;

use App\Config\Fields;
use Modules\HelperWebsite;

class AddView
{

    public static function createAddView(array $params)
    {
//        dd($params);

        $pageName = $params['pageName'];
        $action = $params['action'];
        $csrfToken = $params['csrfToken'];
        $data = $params['data'] ?? [];
        $errors = $params['errors'] ?? [];

        if (count($errors) !== 0) {
//            dd($errors);
        }

        if (count($data) !== 0) {
//            dd($data);
        }

        if (array_key_exists($pageName, Fields::FIELD)) {
            // dynamically create the button name from the controller need to make a better function
            // to trim accordingly for trailing characters s and es

            $buttonName = ucfirst($action) . ' ' . ucfirst($pageName);


            $formHtml = ' <div class="container">';
            $formHtml .= '<form action="" method="post" enctype="multipart/form-data">';


            $errorMessage = $errors['errorMessage'] ?? '';
            echo $errorMessage ? "<p class='text-danger'>$errorMessage</p>" : "";

//            dd(Fields::FIELD[$pageName]);


            foreach (Fields::FIELD[$pageName] as $key => $value) {
                $isRequiredField = ($value['isRequired']) ? 'required' : '';
                $minAgeField = (isset($value['min'])) ? 'min="' . $value['min'] . '" ' : '';
                $maxAgeField = (isset($value['max'])) ? 'max="' . $value['max'] . '" ' : '';
                $step = (isset($value['step'])) ? 'step="' . $value['step'] . '" ' : '';
                $placeholder = (isset($value['placeholder'])) ? 'placeholder="' . $value['placeholder'] . '"' : '';
                $isMultipleFileField = (isset($value['isMultiple']) && $value['isMultiple']) ? 'multiple' : '';

                if ($value['type'] === 'file') { // Check if the current field is a file input

                    $formHtml .= '<input ';
                    $formHtml .= 'class="form-control" ';
                    $formHtml .= 'type="file" id="' . $key . '" name="' . $key . '[]" '; // Note the [] for multiple files
                    $formHtml .= $isRequiredField;
                    $formHtml .= $isMultipleFileField;
                    $formHtml .= '></input><br>';
                } else {
                    // checks to not create the label for HIDDENNAMEASSOC
                    if (!(array_key_exists($key, Fields::HIDDENNAMEASSOC))) {
                        $formHtml .= '<label ';
                        $formHtml .= 'class="form-label" ';
                        $formHtml .= 'for=' . $key . '>' . $value['label'];
                        $formHtml .= '</label>';
                    }

                    // checks to not create drop down select input fields from HIDDENNAMEASSOC
                    if (!(array_key_exists($key, Fields::HIDDENNAMEASSOC))) {

                        // this code block is to transform the id such as collegeId into name to list down for users to select
                        // here $key is again used to identify the corresponding id field, name field and controller
                        // controller is passed to the getFetchColumn() method
                        if (array_key_exists($key, Fields::NAMEASSOC)) {
                            $formHtml .= '<select ';
                            $formHtml .= 'class="form-control" ';
                            $formHtml .= ' id="' . $key . '"  name="' . $key . '"';
                            $formHtml .= '>';
                            $formHtml .= '<option value=""></option>';


                            $fieldId = Fields::NAMEASSOC[$key]['fieldId'];
                            $fieldName = Fields::NAMEASSOC[$key]['fieldName'];

                            //Different controller based on the id identifier from IDS array used to get data of that controller
                            // to fill the dropdown selection
                            $newController = Fields::NAMEASSOC[$key]['controller'];
                            // pass the identifying fieldId and fieldName column names
                            $columnNames = [$fieldId, $fieldName];

                            $listOfItems = HelperWebsite::getFetchColumn($newController, $columnNames);

//                    dd($listOfItems);

                            // Inside the foreach loop for select options:
                            foreach ($listOfItems as $item) {
                                $name = $item[$fieldName];
                                $id = $item[$fieldId];
                                // Check if this option should be selected
                                $selected = (isset($data[$key]) && $data[$key] == $id) ? ' selected' : '';

                                $formHtml .= '<option value="' . ($id ?? '') . '"' . $selected . '>' . htmlspecialchars($name ?? '', ENT_QUOTES, 'UTF-8') . '</option>';
                            }

                            $formHtml .= $isRequiredField;
                            $formHtml .= '</select>';
                            $formHtml .= '<br>';
                        } else {
                            // For non-select inputs:
                            $formHtml .= '<input ';
                            $formHtml .= 'class="form-control" ';
                            $formHtml .= 'type="' . $value['type'] . '" id="' . $key . '"  name="' . $key . '" ';
                            // Check if $data has a value for this field and use it
                            $formHtml .= 'value="' . htmlspecialchars($data[$key] ?? '', ENT_QUOTES, 'UTF-8') . '" ';
                            $formHtml .= $minAgeField;
                            $formHtml .= $maxAgeField;
                            $formHtml .= $step;
                            $formHtml .= $placeholder;
                            $formHtml .= $isRequiredField;
                            $formHtml .= ' ></input>';

                            // Check if there is an error for the current field and add it to the form HTML
                            // Assuming $errors is properly populated and e() is defined for escaping
                            if (isset($errors[$key])) {
                                // Replace e() with htmlspecialchars() if e() is not defined
                                $formHtml .= '<span class="error-message mb-1 text-danger">' . htmlspecialchars($errors[$key], ENT_QUOTES, 'UTF-8') . '</span>';
                            }

                            $formHtml .= '<br>';
                        }
                    }

                }


            }

            $formHtml .= '<input value="' . e($csrfToken) . '" name="token" type="hidden"/>';

            $formHtml .= '<input name="controller" type="hidden" value="' . $pageName . '">';
            $formHtml .= '<input class="btn btn-primary" type="submit" name="submit" value="' . $buttonName . '">';
            $formHtml .= '</form>';
            $formHtml .= '</div>';

            return $formHtml;
        }

        return 'Form does not exist in the FIELD';
    }

}
