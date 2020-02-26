<?php
$dsn = 'mysql:host=localhost;dbname=testing4';
$username = 'root';
$pass = '';
$option = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8'
);
try{
	$connect = new PDO($dsn,$username,$pass,$option);
	$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
}catch(PDOException $e){
	echo 'Faild Connection'.$e->getMessage();
}

session_start();
?>