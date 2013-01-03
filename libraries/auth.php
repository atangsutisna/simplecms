<?php
class Loggin
{
	private $loggin = false;
	private $username;
	private $password;
	private $user_log = false;
	private $current_user;

	private $conn;
	private $table_name = "default_user";
	private $error = array();
	
	function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
		$this->conn = DB_Connection::get_connection();
		$this->db = new DB_Query();
	}
	
	function set_table($table_name)
	{	
		$this->table_name = $table_name;
	}
	
	function make_sure_not_blank()
	{
		$log = false;
		if (empty($this->username) && empty($this->password))
		{
			$this->error[] = "Username and password can't be blank..!";
		}
		else
		{
			$log = true;
		}
		return $log;
	}
	
	function check_user()
	{
		$where = array(
			'username' => $this->username
		);
		$log = false;
		$query =  $this->db->get_where($this->table_name, $where);
		if ($query)
		{
			$this->current_user = $query->result();
			foreach ($query->result() as $user)
			{
				$this->user_log = array(
					'username' => $user->username,
					'password' => $user->password
				);
			}
			//$this->user_log = true;
			$log = true;
		}
		
		
		return $log;
	}
	
	function check_password()
	{
		if ($this->user_log != false)
		{
			if (($this->username == $this->user_log['username']) && 
				($this->password == $this->user_log['password']))
			{
				$this->loggin = true;
			}
			else
			{
				$this->error[] = "Username and Password does'nt match..!";
			}
		}
	}
	
	function validate()
	{
		$valid = false;
		if ($this->check_user() == true)
		{
			$this->check_password();
			if ($this->loggin == true)
			{
				$valid = true;
			}
		}
		else
		{
			$this->error[] = "username undefined";
		}
		
		return $valid;
	}
	
	function get_error()
	{
		return $this->error;
	}
	
	function get_current_user()
	{
		return $this->current_user;
	}
}

?>