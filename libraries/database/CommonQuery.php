<?php

class  CommonQuery extends SimpleQueryBuilder {
	
	function CommonQuery($tableName = '') {
	      $this->setTableName($tableName);
	}
	
	function findAll() {
		$this->init();
		return $this->get()->result();
	}
	
	function findBy($key, $val) {
		$this->where(array($key => $val));
		$query = $this->get();
		
		if ($query->numRows() > 1) {
			return $query->result();
		}
		else {
			return $query->singleResult();	
		}
	}
	
	function add($data) {
		return $this->insert($data)->getInsertId();
	}
	
	function delete($conditions = array()) {
		$tableName = $this->getTableName();
		$query = $this->deleteRow($tableName, $conditions);
		
		return $query->getQueryStatus();
	}

	
	function update($id, $data){
		$this->where(array('id' => $id));
		$tableName = $this->getTableName();
		$query = $this->updateRow($tableName, $data);
		
		return $query->getQueryStatus();
	}
	
	function count($initial = "") {
		
	}
}
?>