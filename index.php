<?php
if (file_exists('config.php'))
{
	require_once('config.php');
	require_once(BASEPATH. "common_resource.php");
	include "themes/default/index.php";
}
else
{
	die("I need config.php file to run this application ");
}
