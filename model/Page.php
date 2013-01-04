<?php
class Page extends CommonQuery {
    
    private static $instace;
    
    public static function getInstance() {
	if ( !self::$instace ) {
	    self::$instace = new Page();
	}
	
	return self::$instace;
    }
    
    function __construct(){
        parent::CommonQuery('pages');
    }
    
    public function findAll() {
        $this->select(array('pages.*', 'users.username'));
	$this->join('users', 'pages.authorid = users.authorid', 'LEFT');
        
        return $this->get()->result();
    }
    
    function update($id, $data){
        $this->where(array('page_id' => $id));
        $tableName = $this->getTableName();
        $query = $this->updateRow($tableName, $data);
        
        return $query->getQueryStatus();
    }
}