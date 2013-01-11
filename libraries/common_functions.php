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
    $pages = $pageObj->findBy('language', 'italia');
    if (is_array($pages)) {
        foreach ($pages as $page ) {
            echo "
                <li><a href=\"?page_id={$page->page_id}\">{$page->title}</a></li>
            ";
        }   
    }
    else {
        $page = $pages;
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
    toEntryArticle($article, false);
    //var_dump(get_object_vars($article));
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

function toEntryArticle($article, $truncate = true ){
    $article_text = $article->text;
    
    if ( $truncate ) {
        $article_text = truncate($article->text, 255);    
    }
    
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
                    {$article_text}
                </p>
            </article>
        ";
}

function showActivatePoll() {
    $pollObj = Poll::getInstance();
    $poll = $pollObj->findActivatePoll();
    echo "<form method=\"post\" action=\"?action=create_poll\">";
    echo "<input type=\"hidden\" name=\"poll_id\" value=\"{$poll->id}\">";
    echo "<h2>Poll</h2>";
    echo "<p>
        {$poll->question}<br><br>
        <input type=\"radio\" name=\"answer_poll\" value=\"{$poll->answer1}\"> {$poll->answer1} <br/>
        <input type=\"radio\" name=\"answer_poll\" value=\"{$poll->answer2}\"> {$poll->answer2} <br/>
        <input type=\"radio\" name=\"answer_poll\" value=\"{$poll->answer3}\"> {$poll->answer3} <br/><br/>
        <input type=\"submit\" value=\"Sumbmit Poll\">
    </p>";
}

function create_poll() {
    $pollObj = PollAnswer::getInstance();
    $data = array(
                'poll_id' => $_POST['poll_id'],
                'answer' => $_POST['answer_poll']
            );
    $pollObj->add($data);
}

function truncate($str_texts, $length, $trailing = '...') {
    return mb_substr($str_texts, 0, $length). $trailing ;
}