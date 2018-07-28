<?php

  require_once("../other/dbconnect.php");

  $name = "RED";

  $sql = "SELECT * FROM test WHERE name = '$name'"; // Составляем запрос
  $query = mysqli_query($mysqli, $sql); // Выполняем запрос

  while($result = $query->fetch_assoc()){
    echo $result["name"]."<br/>";
  }



?>
