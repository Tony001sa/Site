<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Регистрация</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/main.css">
  <script src="javascript/main.js"></script>
</head>
<body id="reg_back">

  <?php
    session_start();
  ?>

  <div class="container">
    <div>
      <?php
        echo($_SESSION["test"]);
        if(isset($_SESSION["server_message"])){
          echo($_SESSION["server_message"]);
          unset($_SESSION["server_message"]);
        }
      ?>
    </div>

    <div id="header">
      <h1 class="display-4" style="color: red;"><em>Форма регистрации</em></h1>
    </div>

    <div>
      <form class="form-group" action="reg_file.php" method="POST" name="form_register">
        <table>
          <tr>
            <td>
              <label for="input_name"><em>Имя</em></label>
              <input id="input_name" class="form-control" type="text" name="first_name" minlength="2" maxlength="255" required />
            </td>
          </tr>

          <tr>
            <td>
              <label for="input_lastname"><em>Фамилия</em></label>
              <input id="input_lastname" class="form-control" type="text" name="last_name" minlength="2" maxlength="255"/>
            </td>
          </tr>

          <tr>
            <td>
              <label for="input_email"><em>Почта</em></label>
              <input id="input_email" class="form-control" type="email" name="email" minlength="2" maxlength="100" required />
              <br>
              <span id="error_email_message" class="message_error"></span>
            </td>
          </tr>

          <tr>
            <td>
              <label for="input_password"><em>Пароль</em></label>
              <input id="input_password" class="form-control" type="password" name="password" minlength="2" maxlength="100" required placeholder="Минимум 2 символа"/>
              <br>
              <span id="error_password_message" class="message_error"></span>
            </td>
          </tr>

          <tr>
            <td>
              <label for="input_capture"><em>Картинка</em></label>
              <br>
              <img src="../image/image.php" alt="капча" />
              <br><br>
              <input id="input_capture" class="form-control" type="text" name="captcha" required>
            </td>
          </tr>

          <tr>
            <td colspan="2">
              <br>
              <button class="btn btn-primary" type="submit" name="button_submit"><em>Регистрация</em></button>
            </td>
          </tr>

        </table>
      </form>
    </div>
  </div>

</body>
</html>
