<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Авторизация</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/main.css">
  <script src="javascript/main.js"></script>
</head>
<body id="auth_back">

  <?php
    session_start();
  ?>

  <div class="container">
    <div class="message_block">
      <?php
        if(isset($_SESSION["server_message"])){
          echo($_SESSION["server_message"]);
          unset($_SESSION["server_message"]);
        }
      ?>
    </div>

    <div id="header">
      <h1 class="display-4" style="color: red;"><em>Форма авторизации</em></h1>
    </div>

    <div>
      <form action="auth_file.php" method="POST" name="form_auth">
        <table>

          <tr>
            <div class="form-group">
              <td>
                <label for="input_email"><em>Почта</em></label>
                <input id="input_email" class="form-control" type="email" name="email" minlength="2" maxlength="100" required />
                <br>
                <span id="error_email_message" class="message_error"></span>
              </td>
            </tr>
            </div>

           <div class="form-group">
             <tr>
               <td>
                 <label for="input_password"><em>Пароль</em></label>
                 <input id="input_password" class="form-control" type="password" name="password" minlength="2" maxlength="100" required placeholder="Минимум 2 символа"/>
                 <br>
                 <span id="error_password_message" class="message_error"></span>
               </td>
             </tr>
           </div>

          <tr>
            <td colspan="2">
              <button class = "btn btn-success" type="submit" name="button_submit_auth">Войти</button>
            </td>
          </tr>

        </table>
      </form>
    </div>
  </div>

</body>
</html>
