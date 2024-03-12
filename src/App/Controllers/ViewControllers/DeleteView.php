<?php

declare(strict_types=1);

class DeleteView
{

    public static function createDeleteView(array $params)
    {

        return "You have reached delete for " . $params['id'];

        $controller = $params['controller'];
        $id = $params['id']; // Assuming the second parameter is the ID for the record to be deleted

        if (array_key_exists($controller, FIELD)) {
            $confirmMessage = "Are you sure you want to delete this $controller with ID $id?";

            $formHtml = '<div class="container">';
            $formHtml .= '<form action="" method="post">';
            $formHtml .= '<p>' . $confirmMessage . '</p>';
            $formHtml .= '<input name="controller" type="hidden" value="' . $controller . '">';
            $formHtml .= '<input name="id" type="hidden" value="' . $id . '">';
            $formHtml .= '<input class="btn btn-danger" type="submit" name="submit" value="Confirm Delete">';
            $formHtml .= '</form>';
            $formHtml .= '</div>';

            return $formHtml;
        }

        return 'Form does not exist in the FIELD';
    }

}
