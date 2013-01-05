<?php
function main() {
    switch (true) {
        case isset($_GET['page_id']) :
            $page_id = $_GET['page_id'];
            showPage($page_id);
        break;
        case isset($_GET['article_id']) :
            $article_id = $_GET['article_id'];
            showArticle($article_id);
        break;
        case isset($_GET['action']) && $_GET['action'] == 'create_poll' :
            echo "<h2 class=\"mainheading\">Thank for you participation..</h2>";
            create_poll();
        break;
        default :
            echo "<h2 class=\"mainheading\">Latest from the blog</h2>";
            showArticles();
    }
}
main();
?>