<?php
session_start();

if(isset($_SESSION['name'])){
    if(isset($_POST['text'])){
      $text = $_POST['text'];
      $fp = fopen("log.html", 'a');
      fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['first_name']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
      fclose($fp);
    }
}
?>
