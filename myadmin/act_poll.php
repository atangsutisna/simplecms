<?php
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    $pollObj = new Poll();
    switch ($act) {
        case "create" :
            if (isset($_POST)) {
                $data = array(
                    'question' => $_POST['question'],
                    'answer1' => $_POST['answer1'],
                    'answer2' => $_POST['answer2'],
                    'answer3' => $_POST['answer3'],
                    'language' => $_POST['lang']
                );
                $createStatus = $pollObj->add($data);
            }
            echo $createStatus ? info("New Poll has been created") : error("New Poll cannot be created");
            break;
        case "edit" :
            if (isset($_GET['id'])) {
                $poll_id = $_GET['id'];
                if (is_numeric($poll_id)) {
                    $poll = $pollObj->findBy('id', $poll_id);
                }
            }
            break;
        case "delete" :
            if (isset($_GET['id'])) {
                $poll_id = $_GET['id'];
                if (is_numeric($poll_id)) {
                    $deleted = $pollObj->delete( array('id' => $poll_id));
                }
                echo $deleted ? info("Poll with ID \"$poll_id\" has been deleted") : error("Poll with ID \"$poll_id\" cannot be deleted");
            }
            break;
        case "update" :
            if (isset($_POST)) {
                $data = array(
                    'question' => $_POST['question'],
                    'answer1' => $_POST['answer1'],
                    'answer2' => $_POST['answer2'],
                    'answer3' => $_POST['answer3'],
                    'language' => $_POST['lang']
                );
                
                $poll_id = $_POST['poll_id'];
                $updateStatus = $pollObj->update($poll_id, $data);
                
                $poll = $pollObj->findBy('id', $poll_id);
            }
            echo $updateStatus ? info("Poll with ID \"$poll_id\" has been updated") : error("Poll with ID \"$poll_id\" cannot be updated");
            break;
        case "act_poll" :
            $poll_id = $_POST['active_poll'];
            $updateNo = $pollObj->query("update polls set active = 'No'");
            $updateStatus = $pollObj->update($poll_id, array('active' => 'Yes'));
            echo $updateStatus ? info("Poll with ID \"$poll_id\" has been updated") : error("Poll with ID \"$poll_id\" cannot be updated");
            break;
    }
}
?>