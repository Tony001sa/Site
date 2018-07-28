<?php

  session_start();
  require_once("../other/dbconnect.php");

  if(isset($_POST["button_submit_auth"])){ //Проверка на существования кнопки

      if(isset($_POST["email"])){ //Проверка существования почты
        $email = trim($_POST["email"]);
        if(!empty($email)){ //Если почта не пуста
          $email = htmlspecialchars($email, ENT_QUOTES);

        }
        else{
          $message = "<p>Ошибка! Введите адрес.</p>";
          redirect_to($message, "http://s1.localhost/MySite/auth/auth.php");
        }
      }
      else{
        $message = "<p>Ошибка! Отутствует поле для ввода почты.</p>";
        redirect_to($message, "http://s1.localhost/MySite/auth/auth.php");
      }



      if(isset($_POST["password"])){ //Проверка существования пароля
        $password = trim($_POST["password"]);
        if(!empty($password)){ //Если почта не пуста
          $password = htmlspecialchars($password, ENT_QUOTES);
          $password = md5($password."top_secret");
        }
        else{
          $message = "<p>Ошибка! Введите пароль.</p>";
          redirect_to($message, "http://s1.localhost/MySite/auth/auth.php");
        }
      }
      else{
        $message = "<p>Ошибка! Отутствует поле для ввода пароля.</p>";
        redirect_to($message, "http://s1.localhost/MySite/auth/auth.php");
      }

      $query ="SELECT first_name, last_name FROM users WHERE email = '$email' AND password = '$password'"; //Запрос на проверку почты и пароля с БД
      $result = mysqli_query($mysqli, $query) or die("Ошибка." . mysqli_error($mysqli));
      if (!$result){
        $message = "<p>Ошибка!!!</p>";
        redirect_to($message, "http://s1.localhost/MySite/auth/auth.php");
      }
      if($result->num_rows == 1) {

          while($info_user = $result->fetch_assoc()){
            $_SESSION['first_name'] = $info_user['first_name'];
            $_SESSION['last_name'] = $info_user['last_name'];
          }

          $_SESSION["email"] = $email;
          $_SESSION["password"] = $password;

          $result->close();

          redirect_to($message, "../index.php");
      }
      if($result->num_rows == 0) {
        $message = "<p>Ошибка! Введен неправильный адрес почты или пароль.</p>";
        redirect_to($message, "http://s1.localhost/MySite/auth/auth.php");
      }

  }
  else{
    exit("<p>Ошибка. Вход без нажатия кнопки входа.</p>");
  }


?>
