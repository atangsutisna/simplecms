<?php
class Post extends CommonQuery {
    private static $instance;
    
    public static function getInstance() {
        if ( !self::$instance ) {
            self::$instance = new Post();
        }
        
        return self::$instance;
    }
    
    function __construct(){
        parent::CommonQuery('articles');
    }
    
    public function findAll() {
        $this->select(array('articles.*', 'users.username'));
	$this->join('users', 'articles.authorid = users.authorid');
        
        return $this->get()->result();
    }
}