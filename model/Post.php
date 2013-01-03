<?php
class Post extends CommonQuery {
    function __construct(){
        parent::CommonQuery('articles');
    }
    
    public function findAll() {
        $this->select(array('articles.*', 'users.username'));
	$this->join('users', 'articles.authorid = users.authorid');
        
        return $this->get()->result();
    }
}