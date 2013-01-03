<?php
/**
 *@author : Atang Sutisna
 *@email : atang.sutisna.87@gmail.com
 */
class QueryResult {
	private $_resource;
	
	function QueryResult($strQuery) {
		$this->_resource = @mysql_query($strQuery) or die(mysql_error());
	}
	
	public function getQueryStatus() {
		return $this->_resource;
	}
	
	public function getQueryErrors() {
		return @mysql_error();
	}
	
	public function numRows() {
		return @mysql_num_rows($this->_resource);
	}
	
	public function resultArray() {
		$resultArr = array();
		while ($row = @mysql_fetch_assoc($this->_resource))
		{
			$resultArr[] = $row;
		}
		
		return $resultArr;
	}
	
	public function result() {
		$result = array();
		while ($row = @mysql_fetch_object($this->_resource)) {
			$result[] = $row;
		}
		
		return $result;
	}
	
	public function singleResult() {
		return @mysql_fetch_object($this->_resource);
	}
	
	public function getInsertId() {
		return @mysql_insert_id();
	}
}
?>