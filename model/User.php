<?php
class User extends CommonQuery {
    function __construct(){
        parent::CommonQuery('users');
    }
    
    public function checkUser($username, $password) {
        $username = $this->findBy('username', $username);
        
        if ( !empty($username) ) {
            return ($username->password == $password);
        }
        else {
            return false;
        }
    }
    
    function update($id, $data){
        $this->where(array('authorid' => $id));
        $tableName = $this->getTableName();
        $query = $this->updateRow($tableName, $data);
        
        return $query->getQueryStatus();
    }
}