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
        default :
            showArticles();
    }
}
main();
?>