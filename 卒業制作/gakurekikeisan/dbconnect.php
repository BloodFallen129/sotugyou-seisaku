<?php
//こんにちは
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "gakureki";

try{
    $db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
}catch(PDOException $e){
    echo "データベースエラー:" .$e->getMessage();
}
?>
