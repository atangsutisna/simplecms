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
    
    function findActivatePoll($lang = '') {
        $query = $this->query("select * from polls where active = 'Yes' and language = '{$lang}'");
        return $query->singleResult();
    }
    
    function findByLang($lang) {
        $this->where(array('language' => $lang));
	$query = $this->get();
        
        return $query->result();
    }
}