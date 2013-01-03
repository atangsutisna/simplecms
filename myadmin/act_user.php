<?php
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    $userObj = new User();
    switch ($act) {
        case "create" :
            if (isset($_POST)) {
                $passHash = md5($_POST['password']);
                $data = array(
                    'username' => $_POST['username'],
                    'password' => $passHash,
                    'email' => $_POST['email']
                );
                $createStatus = $userObj->add($data);
            }
            echo $createStatus ? info("User has been created") : error("User cannot be created");
            break;
        case "edit" :
            if (isset($_GET['id'])) {
                $user_id = $_GET['id'];
                if (is_numeric($user_id)) {
                    $user = $userObj->findBy('authorid', $user_id);
                }
            }
            break;
        case "update" :
            if (isset($_POST)) {
                $data = array(
                    'username' => $_POST['username'],
                    'email' => $_POST['email']
                );
                $user_id = $_POST['user_id'];
                $updateStatus = $userObj->update($user_id, $data);
                
                $user = $userObj->findBy('authorid', $user_id);
            }
            echo $updateStatus ? info("User has been updated") : error("User cannot be updated");
            break;
    }
}
?>