<?php
session_start();
header("Access-Control-Allow-Origin: *");
header('X-Frame-Options:DENY');
$hn      = 'localhost';
$un      = 'root';
$pwd     = 'abc123';
$db      = 'ps2';
$cs      = 'utf8';
$dsn  = "mysql:host=" . $hn . ";port=3306;dbname=" . $db . ";charset=" . $cs;
$opt  = array(
                     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                     PDO::ATTR_EMULATE_PREPARES   => false,
                    );
$pdo = new PDO($dsn, $un, $pwd, $opt);

$id =$_GET['id'];


try{
  $stmt = $pdo -> prepare("SELECT sum from dated_sum where ID='$id'");
  $stmt -> execute();
  $row = $stmt -> fetchAll();
  $js=json_encode($row,JSON_UNESCAPED_SLASHES);
  echo $js;
}
catch(Exception $e){
	echo $e->getMessage();
}
?>

