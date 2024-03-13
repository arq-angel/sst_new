<?php

declare(strict_types=1);

namespace App\Controllers\ViewControllers;

use Modules\HelperWebsite;
use App\Config\Site;

class ViewController
{

    public static function loadViewController(array $params)
    {


        if (isset($params['pageName'])) {
            $title = $params['pageName'];
            $rootUrl = Site::ROOT_URL;
        } else {
            $title = 'Title not defined';
            $rootUrl = Site::ROOT_URL;
        }

        // load header
        echo self::getBase([
            'title' => $title,
            'rootUrl' => $rootUrl
        ]);


        // view for all list of data
        if (isset($params['action']) && $params['action'] === 'viewAll') {

            // Pagination parameters
            // so the users can easily understand that first page starts at 1 instead of 0 which might create confusion
            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $recordsPerPage = 5;

            // Calculate offset
            //  0, which correctly starts fetching records from the beginning of the dataset because
            // offset of 1 will skip the first row of data
            $offset = ($currentPage - 1) * $recordsPerPage;

            $pageName = $params['pageName'];
            $data = HelperWebsite::getViewRecordWithLimit($pageName, $recordsPerPage, $offset);

//            dd($data);

            $hasNextPage = count($data) >= 5;

            // calling the loadAllView method to display the data from database
            $viewAllData = self::loadAllView([
                'pageName' => $pageName,
                'data' => $data,
            ]);

            echo $viewAllData;

            /// Pagination links
            $paginationHtml = '<div class="container">';
            $paginationHtml .= '<div class="row justify-content-center">';
            $paginationHtml .= '<nav class="d-flex justify-content-center" aria-label="Page navigation">';
            $paginationHtml .= '<ul class="pagination">';
            // Previous button
            if ($currentPage > 1) {
                $prevPage = $currentPage - 1;
                $paginationHtml .= '<li class="page-item"><a class="page-link" href="?page=' . $prevPage . '"><<</a></li>';
            }
            $paginationHtml .= '<li class="page-item"><a class="page-link" href="">'. $currentPage .'</a></li>';
            // Next button - shown if there are records for the next page
            if ($hasNextPage) {
                $nextPage = $currentPage + 1;
                $paginationHtml .= '<li class="page-item"><a class="page-link" href="?page=' . $nextPage . '">>></a></li>';
            }

            $paginationHtml .= '</ul>';
            $paginationHtml .= '</nav>';
            $paginationHtml .= '</div>';
            $paginationHtml .= '</div>';

            echo $paginationHtml;

        } elseif (isset($params['action']) && $params['action'] === 'add') {

            $pageName = $params['pageName'];
            $action = $params['action'];
            $csrfToken = $params['csrfToken'];
            $data = $params['data'] ?? [];
            $errors = $params['errors'] ?? [];

//            dd($params);

            $addData = self::loadAddView([
                'pageName' => $pageName,
                'action' => $action,
                'csrfToken' => $csrfToken,
                'data' => $data,
                'errors' => $errors,
            ]);

            echo $addData;

        }




        // load header
        echo self::getBase(isFooter: true);

    }

    public static function getBase(array $params = [], bool $isFooter = false):string{
        $link_file =  __DIR__ . "/../../views/includes/appHeader.php";
        if($isFooter){
            $link_file =  __DIR__ . "/../../views/includes/appFooter.php";
        }else{
            $title = ucfirst($params['title']) . " Page";
            $rootUrl = $params['rootUrl'];
        }
        ob_start();
        include_once $link_file;
        return ob_get_clean();
    }


     //using the output buffer ob to create buffer before outputting otherwise the inlcude_once includes as soon as it's called
//    public static function loadHeader(array $params)
//    {
//        $title = ucfirst($params['title']) . " Page";
//        $rootUrl = $params['rootUrl'];
//        $link_file =  __DIR__ . "/../../views/includes/appHeader.php";
//        ob_start();
//        include_once $link_file;
//        return ob_get_clean();
//    }
//
//    public static function loadFooter()
//    {
//        return require_once __DIR__ . "/../../views/includes/appFooter.php";
//    }

    public static function loadAllView(array $params)
    {
        return AllView::createAllView($params);
    }

    public static function loadEachView(array $params)
    {
        return EachView::createEachView($params);
    }

    public static function loadAddView(array $params)
    {
        return AddView::createAddView($params);
    }

    public static function loadEditView(array $params)
    {
        return EditView::createEditView($params);
    }

    public static function loadDeleteView(array $params)
    {
        return DeleteView::createDeleteView($params);
    }

    public static function loadErrorView(array $errors)
    {
        return ErrorView::createErrorView($errors);
    }

}

