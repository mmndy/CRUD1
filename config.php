<?php
if(!defined('HOST')) define('HOST', 'localhost');
if(!defined('USER')) define('USER', 'root');
if(!defined('PASS')) define('PASS', '');
if(!defined('BASE')) define('BASE', 'elden');

$conn = new MySQLi(HOST, USER, PASS, BASE);

if($conn->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}
?>
