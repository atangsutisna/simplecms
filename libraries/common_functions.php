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
            <li><a href=\"?page_id={$page->page_id}\">{$page->title}</a></li>
        ";
    }
}

function showArticles() {
    $articles = Post::getInstance();
    foreach ($articles->findAll() as $article) {
        toEntryArticle($article);
    }
}

function showArticle($article_id) {
    $articleObj = Post::getInstance();
    $article = $articleObj->findBy('id', $article_id);
    toEntryArticle($article);
}

function showPage($page_id) {
    $pageObj = Page::getInstance();
    $page = $pageObj->findBy('page_id', $page_id);
    echo "
            <article class=\"post\">
                <header>
                    <h3>
                        {$page->title}
                    </h3>
                    <p class=\"postinfo\">
                    Published on <time>".date("F j, Y", strtotime($page->created_at))."</time>
                    </p>
                </header>
                <p>
                    {$page->content}
                </p>
            </article>
        ";
}

function toEntryArticle($article){
    echo "
            <article class=\"post\">
                <header>
                    <h3>
                        <a href='?article_id={$article->id}'>
                        {$article->title}
                        </a>
                    </h3>
                    <p class=\"postinfo\">
                    Published on <time>".date("F j, Y", strtotime($article->date))."</time>
                    </p>
                </header>
                <p>
                    {$article->text}
                </p>
            </article>
        ";
}