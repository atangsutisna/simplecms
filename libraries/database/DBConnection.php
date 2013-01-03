<?php

class DBConnection {	
	private static $conn = false;
	
	public static function getConnection($dbHost, $dbName, $dbUser, $dbPass)
	{
		$openConn = @mysql_connect($dbHost, $dbUser, $dbPass) or die(mysql_error());
		$openDbConn = @mysql_select_db($dbName, $openConn) or die(mysql_error());
		self::$conn = $openConn && $openDbConn;
			
		return self::$conn; 
	}
}
?>