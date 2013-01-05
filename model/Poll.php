<?php
class Poll extends CommonQuery {
    private static $instance;
    
    
    public static function getInstance() {
        if ( !self::$instance ) {
            self::$instance = new Poll();
        }
        
        return self::$instance;
    }
    
    function __construct(){
        parent::CommonQuery('polls');
    }
    
    function findActivatePoll() {
        return $this->findBy('active', 'Yes');
    }
}