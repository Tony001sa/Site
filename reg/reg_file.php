<?php
    session_start();
    require_once("../other/dbconnect.php");

      if(isset($_POST["button_submit"])){ //Проверка на существования кнопки

      if(isset($_POST["captcha"])){ //Проверка существования поля капчи
        $captcha = trim($_POST["captcha"]);
        if($_SESSION["rand_captcha"] != $captcha){ //Проверка номера капчи
           $message = "<p>Ошибка! Неверная капча.</p>";
           redirect_to($message, "http://s1.localhost/register.php");
        }
      }
      else {
        $back = "register.php";
        exit("<p>Ошибка! Капча не заполнена. Вы можете перейти на <a href=".$back.">главную страницу</a></p></p>");
      }

      if(isset($_POST["first_name"])){ //Проверка существования поля имени
        $first_name = trim($_POST["first_name"]);
        if(!empty($first_name)){ //Если имя состоит из пробелов
          $first_name = htmlspecialchars($first_name, ENT_QUOTES);
        }
        else{
          $message = "<p>Ошибка в имени!</p>";
          redirect_to($message, "register.php");
        }
      }
      else{
        $message = "<p class='message_error'>Ошибка! Отутствует имя.</p>";
        redirect_to($message, "http://s1.localhost/register.php");
      }

      if(isset($_POST["last_name"])){ //Проверка существования поля фамилии
        $last_name = trim($_POST["last_name"]);
        if(!empty($last_name)){ //Если фамилия состоит из пробелов
          $last_name = htmlspecialchars($last_name, ENT_QUOTES);
        }
        else{
          $message = "<p>Ошибка в фамилии!</p>";
          redirect_to($message, "register.php");
        }
      }
      else{
        $message = "<p class='message_error'>Ошибка! Отутствует фамилия.</p>";
        redirect_to($message, "http://s1.localhost/register.php");
      }

      if(isset($_POST["email"])){ //Проверка существования почты
        $email = trim($_POST["email"]);
        if(!empty($email)){ //Если почта не пуста
          $email = htmlspecialchars($email, ENT_QUOTES);
          $reg_email = "/@/"; //Регулярное выражение
          if(!preg_match($reg_email, $email)){
            $message = "<p class='message_error'>Ошибка! Некорректный адрес.</p>";
            redirect_to($message, "http://s1.localhost/MySite/reg/register.php");
          }
          $query ="SELECT 'email' FROM users WHERE email = '$email'";
          $result = mysqli_query($mysqli, $query) or die("Пользователь с такой почтой уже зарегистрирован." . mysqli_error($mysqli));
          if($result->num_rows == 1) {
            $message = "<p class='message_error'>Ошибка! Такая почта уже есть.</p>";
            redirect_to($message, "http://s1.localhost/MySite/reg/register.php");
          }
        }
        else{
          $message = "<p>Ошибка! Пустое поле для почты.</p>";
          redirect_to($message, "http://s1.localhost/MySite/reg/register.php");
        }
      }
      else{
        $message = "<p class='message_error'>Ошибка! Отутствует поле почты.</p>";
        redirect_to($message, "http://s1.localhost/MySite/reg/register.php");
      }

      if(isset($_POST["password"])){ //Проверка существования поля пароля
        $password = trim($_POST["password"]);
        if(!empty($password)){ //Если фамилия состоит из пробелов
          $password = htmlspecialchars($password, ENT_QUOTES);
          $password = md5($password."top_secret");
        }
        else{
          $message = "<p>Ошибка! Укажите ваш пароль</p>";
          redirect_to($message, "register.php");
        }
      }
      else{
        $message = "<p>Ошибка! Отутствует поле для ввода пароля.</p>";
        redirect_to($message, "http://s1.localhost/MySite/reg/register.php");
      }

      //Вставляем данные в БД
      $query = "INSERT INTO users (first_name, last_name, email, password) VALUES ('".$first_name."', '".$last_name."', '".$email."', '".$password."')";
      $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli));
      if(!$result){
        $message = "<p>Ошибка! Не удалось отправить данные на сервер.</p>";
        redirect_to($message, "http://s1.localhost/MySite/reg/register.php");
      }
      else{
        $message = "<p>Все получилось. Ура!</p>";
        redirect_to($message, "http://s1.localhost/MySite/auth/auth.php");
        $mysqli->close();
      }

    }//Конец проверки на существование кнопки регистрации


?>
