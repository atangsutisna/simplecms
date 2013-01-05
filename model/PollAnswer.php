<?php
class PollAnswer extends CommonQuery {
    private static $instance;
    
    
    public static function getInstance() {
        if ( !self::$instance ) {
            self::$instance = new PollAnswer();
        }
        
        return self::$instance;
    }
    
    function __construct(){
        parent::CommonQuery('pollanswers');
    }
    
}