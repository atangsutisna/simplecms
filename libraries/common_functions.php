<?php

function info($customMsg){
    $info = "
    <div class=\"alert alert-success\">
        {$customMsg}
    </div>";
    return $info;
}

function error($customMsg){
    $error = "
    <div class=\"alert alert-error\">
         {$customMsg}
    </div>";
    return $error;
}

function getCurrentUser() {
    $user = new User();
    $currentUser = $_SESSION['current_user'];
    $result = $user->findBy('username', $currentUser);
    
    return $result;
}

function findBlogInfo($infoType) {
    switch ($infoType) {
        case 'base_uri' :
        $base_url = BASE_URL;
        return $base_url;
        break;
        default :
        return "bla--"  ; 
    }
}

function showPages() {
    $pageObj = Page::getInstance();
    $pages = $pageObj->findAll();
    foreach ($pages as $page ) {
        echo "
            <li><a href=\"#\">{$page->title}</a></li>
        ";
    }
}