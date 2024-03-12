<?php

declare(strict_types=1);

class EditView
{

    public static function createEditView(array $params)
    {

        $controller = $params['controller'];
        $action = $params['action'];
        $id = $params['id']; // Assuming the third parameter is the ID for the record to be edited
        $allRecords = $params['data'];

        if (array_key_exists($controller, FIELD)) {

            $buttonName = 'Update ' . ucfirst(substr($controller, 0, -1));

            $formHtml =' <div class="container">';
            $formHtml .= '<form action="" method="post">';

            foreach (FIELD[$controller] as $key => $value) {

                $isRequiredField = ($value['isRequired']) ? 'required' : '';
                $minAgeField = (isset($value['min'])) ? 'min="' . $value['min'] . '" ' : '';
                $maxAgeField = (isset($value['max'])) ? 'max="' . $value['max'] . '" ' : '';
                $placeholder = (isset($value['placeholder'])) ? 'placeholder="' . $value['placeholder'] . '"' : '';

                $formHtml .= '<label ';
                $formHtml .= 'class="form-label" ';
                $formHtml .= 'for='. $key .'>'. $value['label'];
                $formHtml .= '</label>';

                // Assuming you retrieve the existing data from the database based on the ID
                $existingData = ''; // Replace this with your code to fetch data based on $id

                $formHtml .= '<input ';
                $formHtml .= 'class="form-control" ';
                $formHtml .= 'type='. $value['type'] .' id='. $key .'  name='. $key  .' value="'. $existingData[$key] .'" ';

                $formHtml .= $minAgeField;
                $formHtml .= $maxAgeField;
                $formHtml .= $placeholder;
                $formHtml .= $isRequiredField;
                $formHtml .= ' ></input>';
                $formHtml .= '<br>';
            }

            $formHtml .= '<input name="controller" type="hidden" value="'. $controller .'">';
            $formHtml .= '<input name="id" type="hidden" value="'. $id .'">';
            $formHtml .= '<input class="btn btn-primary" type="submit" name="submit" value="'.  $buttonName .'">';
            $formHtml .= '</form>';
            $formHtml .='</div>';

            return $formHtml;
        }

        return 'Form does not exist in the FIELD';

    }

}
