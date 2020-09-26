<!DOCTYPE html>
<?php

session_start(); // Inicia a sessão

unset($_SESSION['user']);

?>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width ,initial-scale=1">
  <title>Terceiro trabalho - SQL Injection e XSS</title>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="_CSS/boot.css">
  <link rel="stylesheet" href="_CSS/estilo.css">
</head>

<body>
  <div class="container bg-branco main_menu">
    <div class="content">
      <h1><a style="text-decoration: none; color: #fff;" href="index.php">Terceiro Trabalho - Segurança em Sistemas</a></h1>
      <div class="clear"></div>
    </div>
  </div>
  <div class="container al-center main_formulario">
    <div class="content">
      <h1 style="font-size: 2em; margin-bottom: 20px;">Login Usuario</h1>
      <form action="login.php" method="post">
        <label>USUARIO
          <div>
            <input type="text" name="login" value="">
          </div>
        </label>
        <label>SENHA
          <div>
            <input type="password" name="senha" value="">
          </div>
        </label>
        <div style="text-align:center;">
          <button type="submit" name="button">ENTRAR</button>
        </div>
      </form>
      
      <div class="clear"></div>
    </div>
  </div>

  <footer class="container main_footer main_falha">
    <div class="content">
      <h1>FALHAS: <span style="color: #fff;">SQL Injection no Login e XSS persistent nos comentários</span></h1>
      <p style="text-align: right;"><b>Autores: </b><b style="color: #e74c3c;">Filipe A. Sampaio</b><br><b style="color: #e74c3c;">João Lucas Mota</b><br><b style="color: #e74c3c;">Rodrigo Elyel Batista</b></p>
      <div class="clear"></div>
    </div>
  </footer>
</body>

</html>