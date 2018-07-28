<?php

function redirect_to($message, $address){ //Функция редиректа
$_SESSION["server_message"] = $message;
header("HTTP/1.1 301 Moved Permanently");
header("Location: $address");

exit();
}

  header('Content-type: text/html; charset=utf-8');

  $server = "localhost";
  $username = "root";
  $password = "root";
  $database = "myfirstsite";

  $mysqli= new mysqli($server, $username, $password, $database);

  if(!$mysqli) {
    die("<p>Ошибка подключения к БД.</p>
         <p>Код ошибки: ".$mysqli->connect_errno."</p>
         <p>Описание ошибки: ".$mysqli->connect_error."</p>");
  }

  $mysqli->set_charset('utf-8');

  $address_site = "D:/USR/www/s1.localhost/MySite";
?>
