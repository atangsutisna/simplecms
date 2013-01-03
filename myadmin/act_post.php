<?php
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    $postObj = new Post();
    $currentUser = $_SESSION['current_user'];
    switch ($act) {
        case "create" :
            if (isset($_POST)) {
                $data = array(
                    'title' => $_POST['title'],
                    'text' => $_POST['textVal'],
                    'authorid' => getCurrentUser($currentUser)->authorid,
                    'date' => date('Y-m-d')
                );
                $createStatus = $postObj->add($data);
            }
            echo $createStatus ? info("Article has been created") : error("Articles cannot be created");
            break;
        case "delete" :
            if (isset($_GET['id'])) {
                $article_id = $_GET['id'];
                if (is_numeric($article_id)) {
                    $deleted = $postObj->delete( array('id' => $article_id));
                }
                echo $deleted ? info("Article has been deleted") : error("Articles cannot be deleted");
            }
            break;
        case "edit" :
            if (isset($_GET['id'])) {
                $article_id = $_GET['id'];
                if (is_numeric($article_id)) {
                    $article = $postObj->findBy('id', $article_id);
                }
            }
            break;
        case "update" :
            if (isset($_POST)) {
                $data = array(
                    'title' => $_POST['title'],
                    'text' => $_POST['textVal'],
                    'authorid' => getCurrentUser($currentUser)->authorid,
                    'date' => date('Y-m-d')
                );
                $article_id = $_POST['article_id'];
                $updateStatus = $postObj->update($article_id, $data);
                
                $article = $postObj->findBy('id', $article_id);
            }
            echo $updateStatus ? info("Article has been updated") : error("Articles cannot be updated");
            break;
    }
}
?>