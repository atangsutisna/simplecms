<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "u946015410_test";

require_once 'DBConnection.php';
require_once 'SimpleQueryBuilder.php';
require_once 'QueryResult.php';

$conn = DBConnection::getConnection($dbhost, $dbname, $dbuser, $dbpass);
$post = new SimpleQueryBuilder('articles');
$post->where(array('id' => 3));
$result = $post->updateRow('article', $data = array('ui' => 'pppp'));

//var_dump($result->result());
?>