<?php //if (!defined('BASEPATH')) exit('You are not allowed access this script directly');

class SimpleQueryBuilder {
	private $_tableName;
	private $_query;
	
	private $_select;
	private $_from;
	private $_where;
	private $_orderBy;
	private $_limit;
	private $_offset;
	private $_join;
	private $_groupBy;
	
	function SimpleQueryBuilder($tableName = '') {
		$this->_tableName = $tableName;
		$this->init();
	}
	
	function init() {
		$this->_query = "";
		$this->_select = false;
		$this->_from = false;
		$this->_where = false;
		$this->_orderBy = false;
		$this->_limit = false;
		$this->_offset = false;
		$this->_join = array();
		$this->_groupBy = false;
	}
	
	public function setTableName($tableName = '') {
		$this->_tableName = $tableName;
	}
	
	public function getTableName() {
		return $this->_tableName;
	}
	
	public function query($query_string)
	{
		if ( !empty($query_string)) {
			$query = new QueryResult($query_string);
			$this->init();
			return $query;
		}
		else {
			return;
		}
		
	}
	
	public function select($selects )
	{
		if (is_array($selects)) {
			$this->_select = $this->_parseArrToStr($selects);	
		}
	}
	
	/**
	* helper function 
	* used to parse from array to str
	**/
	private function _parseArrToStr($strArr, $connector = ",") {
		if (is_array($strArr)) {
			$newStr = implode($connector, $strArr);
			return $newStr;
		}
		else {
			return;
		}
	}
	
	public function from($tableName = '') {
		$this->_from = " FROM ";
		if (!empty($tableName) || is_array($tableName)) {
			$this->_from .= $this->_parseArrToStr($tableName);
		}
		
		$this->_from .= $this->_tableName;
	}
	
	public function limit($limit = 10, $offset = 0)
	{
		$this->_limit = " LIMIT {$limit}, {$offset}";
	}
	
	public function where($where_condition = '')
	{
		if (is_array($where_condition)) {
			$this->_where = $this->comparison_str($where_condition);
		}
		else {
			return;
		}
	}
	
	public function join($joinTable, $fieldComparation, $type = "INNER") {
		$sqlJoinStr = "{$type} JOIN {$joinTable} ON {$fieldComparation}";
		$this->_join[] = $sqlJoinStr;
	}
	
	public function order_by($field_name, $type = '')
	{
		if (empty($field_name))
		{
			return;
		}
		$this->_order_by = " ORDER BY {$field_name} "; 
		
		if ($type !== '')
		{
			$this->_order_by .= " {$type} ";
		}
		
		return $this->_order_by;
	}
	
	private function negation_str($arr)
	{
		$data = array();
		
		foreach ($arr as $k => $v)
		{
			$data[] = $k. " != " .$this->escape_str($va);
		}
		
		return $data;
	}
	
	public function comparison_str($arr)
	{
		$data = array();
		
		foreach ($arr as $k => $v)
		{
			$data[] = $k." = ".$this->escape_str($v);
		}
		
		return $data;
	}
	
	
	function get_where($table_name, $where = array(), $limit = 10, $offset =0)
	{	
		$sql = "SELECT ";
		if ($this->_select)
		{
			$sql .= $this->_parseArrToStr($this->_select);
		}
		else
		{
			$sql .= " * ";
		}
		
		
		if ($this->_from)
		{
			$sql .= " FROM {$table_name}";
		}
		else
			$sql .= " FROM ".implode(",", $this->_from);
			

		if (count($where) === 0)
		{
			return FALSE;
		}
		else
		{
			$sql .= " WHERE ".implode("AND", $this->comparison_str($where));
		}
		
		return $this->query($sql);
	}
	
	public function get() {
		$sql = "SELECT ";
		if ( !empty($this->_select) ) {
			$sql .= $this->_select;
		}
		else {
			$sql .= "*";
		}
		$sql .= " FROM ";
		if ( !empty($this->_from) ) {
			$sql .= $this->_from;
		}
		else {
			$sql .= " {$this->_tableName} ";
		}
		
		if ( !empty($this->_join) ) {
			$sql .= $this->_parseArrToStr($this->_join);
		}
		
		if ( !empty($this->_where)) {
			$sql .= " WHERE ". implode(",", $this->_where);
		}
		//echo $sql;
		return $this->query($sql);
	}
	
	function insert($data)
	{
		$fields = implode(",", array_keys($data));
		$tmp_data = array();
		foreach ($data as $val)
		{
			$tmp_data[] = $this->escape_str($val);
		}
		$sql = "INSERT INTO {$this->_tableName} ({$fields}) VALUES(".implode(",", $tmp_data).")";
		
		return $this->query($sql);
	}
	
	function escape_str($val)
	{
		$tmp_str = stripslashes($val);
		
		switch (gettype($tmp_str))
		{
			case 'string' : 
				$tmp_str = "'".mysql_real_escape_string($tmp_str)."'";
				break;
			case 'boolean' :
				$tmp_str = ($str === FALSE) ? 0 : 1;
				break;
			default		   :
				$tmp_str = ($str === NULL) ? 'NULL' : $str;
				break;
		}
		
		return $tmp_str;
	}
	
	
	public function deleteRow($table_name, $where = '') {
		if (is_array($where)) {
			$conditions = $this->comparison_str($where);
		}
		
		$sql = "DELETE FROM {$table_name} WHERE ".implode("AND", $conditions);
		
		return $this->query($sql);
	}
	
	public function updateRow($table_name, $data)
	{
		
		$sql = "UPDATE {$table_name} SET ".implode(",", $this->comparison_str($data));
		$sql .= " WHERE ".implode(" AND ", $this->_where);
		//echo $sql;
		return $this->query($sql);
	}
	
	public function countRow($table_name, $initial = '') {
		$sql = "SELECT COUNT(*) ";
		
		if ($initial !== "")
		{
			$sql .= " as {$initial} FROM {$table_name}";
		}
		
		return $this->query($sql);
	}
	
	function db_error($query_string)
	{
		?>
		<html>
			<head>
				<title>MySQL Error</title>
				<style>
					body {
						font-family : verdana;
						color : red;
						font-size : 12px;
					}
					
					#header {
						width : 800px;
						padding : 5px;
						margin-right : auto;
						margin-left : auto;
						background: red;
						color : white;
					}
					#content {
						
					}
				</style>
			</head>
			
			<body>
				<div id="header">
					<h3>MySQL Error : <?php echo mysql_error(); ?></h3><br>
					<p><?php echo $query_string; ?></p>
					<b>cms-atang</b>
				</div>
			</body>
		</html>
		<?php
	}
	
	function __call($method, $arguments) {
		echo "The method <b>{$method}</b> is undefined in <b>SimpleQueryBuilder</b>";
	}
	
}

// * buat koneksi dengan memanggil kelas DB_Connection
//DB_Connection::get_connection();
// * buat objek baru dari kelas DB_Query;
//$users = new DB_Query();
//* lakukan query

//* fungsi where digunakan untuk menyaring atau menfilter record-record tertentu */
//$users->where("category_id", "11");

//* fungsi get untuk menampilkan semua record pada suatu table */
//$query = $users->get("articles");
// * untuk menampilkan hasil, gunakan foreach */
/*
foreach ($query->result() as $user)
{
	echo $user->title. " ".$user->created_on;
	echo "<br>";
}
*/
?>