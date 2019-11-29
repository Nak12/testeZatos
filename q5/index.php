<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Index</title>
</head>
<body>
  <form action="login.php" method="post" id="formlogin" name="formlogin">
    <fieldset>
      <legend>LOGIN</legend><br>
      <label>Nome: </label>
      <input type="text" name="username" id="username" /><br><br>

      <label>Senha: </label>
      <input type="password" name="password" id="password" /><br><br>

      <input type="submit" name="submitBtn" value="Logar" onclick="return validateForm('username', 'password')">
    </fieldset>
  </form>

  <?php
    //inicia a sessão
    session_start();
    if (isset($_SESSION['message'])){
      echo '<p style="color: red;">' . $_SESSION['message'] . '</p>';
      unset($_SESSION['message']);
    }
  ?>

  <script src="validation.js"></script>
</body>
</html>