<?php
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    $pageObj = new Page();
    $currentUser = $_SESSION['current_user'];
    switch ($act) {
        case "create" :
            if (isset($_POST)) {
                $data = array(
                    'title' => $_POST['title'],
                    'content' => $_POST['textVal'],
                    'authorid' => getCurrentUser($currentUser)->authorid,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d'),
                );
                $createStatus = $pageObj->add($data);
            }
            echo $createStatus ? info("Page has been created") : error("Page cannot be created");
            break;
        case "delete" :
            if (isset($_GET['id'])) {
                $page_id = $_GET['id'];
                if (is_numeric($page_id)) {
                    $deleted = $pageObj->delete( array('page_id' => $page_id));
                }
                echo $deleted ? info("Page has been deleted") : error("Page cannot be deleted");
            }
            break;
        case "edit" :
            if (isset($_GET['id'])) {
                $page_id = $_GET['id'];
                if (is_numeric($page_id)) {
                    $page = $pageObj->findBy('page_id', $page_id);
                }
            }
            break;
        case "update" :
            if (isset($_POST)) {
                $data = array(
                    'title' => $_POST['title'],
                    'content' => $_POST['textVal'],
                    'authorid' => getCurrentUser($currentUser)->authorid,
                    'updated_at' => date('Y-m-d')
                );
                $page_id = $_POST['page_id'];
                $updateStatus = $pageObj->update($page_id, $data);
                
                $page = $pageObj->findBy('page_id', $page_id);
            }
            echo $updateStatus ? info("Page has been updated") : error("Page cannot be updated");
            break;
    }
}
?>