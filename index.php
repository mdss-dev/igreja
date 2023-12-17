<?php
require_once("conexao.php");
 ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<link href="img/Logo_Ico-4.ico" rel="shortcut icon" type="image/x-icon">
  <link rel="stylesheet" href="./css/login.css">
  <title>ICO</title>
</head>
<body>
<div class="login">
	<img src="img/Logo_Ico-2.png" width="100%" class="mb-4">
    <form method="post" action="autenticar.php">
    	<input type="text" name="usuario" placeholder="Email ou CPF" required="required" />
      <input type="password" name="senha" placeholder="Insira sua Senha" required="required" />
      <button type="submit" class="btn btn-primary btn-block btn-large">Logar</button>
    </form>
</div>
</body>
</html>