<?php
session_start();

error_reporting(E_ALL ^ E_NOTICE); // #1 Report all Errors
error_reporting(0); // #2 No Error Reporting

define('LIBRARIES', BASEPATH. 'libraries/');
define('MODEL', BASEPATH. 'model/');
// load databse libraries
require_once(LIBRARIES. 'database/DBConnection.php');
require_once(LIBRARIES. 'database/SimpleQueryBuilder.php');
require_once(LIBRARIES. 'database/QueryResult.php');
require_once(LIBRARIES. 'database/CommonQuery.php');
require_once(LIBRARIES. 'common_functions.php');

// load data model
require_once(MODEL. 'Post.php');
require_once(MODEL. 'User.php');
require_once(MODEL. 'Page.php');
require_once(MODEL. 'Poll.php');
require_once(MODEL. 'PollAnswer.php');

//load language
require_once('lang.php');
DBConnection::getConnection(DB_HOST, DB_NAME, DB_USER, DB_PASS);
