<?php
class Page extends CommonQuery {
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