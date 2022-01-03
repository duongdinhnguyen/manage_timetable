<?php 
// define('DB_HOST','localhost');
// define('DB_USER','root');
// define('DB_PASS','');
// define('DB_NAME','mvc_master');
// define('DB_CHARSET','utf8');

define('APPROOT',dirname(dirname(__FILE__)));

// define('URLROOT','http://localhost:8080/manage_timetable');
define('URLROOT','http://' . $_SERVER['HTTP_HOST'].'/manage_timetable');

define('IMAGE', URLROOT.'/web/img');
define('AVATA1', URLROOT.'/web/avatar/');
define('AVATA', dirname(dirname(dirname(__FILE__))).'/web/avatar/');
// echo AVATA;
?>