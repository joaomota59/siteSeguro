<!DOCTYPE html>
<?php
session_start(); // Inicia a sessão
unset($_SESSION['tentativas']);
unset($_SESSION['msgip']);
unset($_SESSION['IPATACK']);
?>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width ,initial-scale=1">
  <title>Terceiro trabalho - SQL Injection e XSS</title>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="_CSS/boot.css">
  <link rel="stylesheet" href="_CSS/estilo.css">
  <?php
  define('DB_SERVER', 'remotemysql.com');
  define('DB_USERNAME', 'kJ4MSjHlRu');
  define('DB_PASSWORD', 'hATDyIS0nz');
  define('DB_DATABASE', 'kJ4MSjHlRu');
  $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
  $ID = htmlspecialchars($db->real_escape_string($_GET['id']));
  $sql = "SELECT * FROM usuario WHERE ID = $ID"; // '1' or '1' = '1'
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if ($_SESSION['user'] == "") {
    header("Location: index.php");
  };
  ?>
</head>

<body>
  <div class="container bg-preto">
    <div class="content">
      <h1><a style="text-decoration: none; color: #fff;" href="index.php">Página de Login</a></h1>
    </div>
    <div class="clear"></div>
  </div>

  <div class="container main_info">
    <div class="content">
      <h1 style="margin-bottom: 20px; font-size: 1.8em;">INFORMAÇÕES DO USUÁRIO</h1>
      <p><b>ID: </b><?php echo $row['ID'] ?></p>
      <p><b>NOME DE USUARIO: </b><?php echo $row['login'] ?></p>
      <div class="clear"></div>
    </div>

    <div class="container al-center main_formulario">
      <form action="comentario.php" method="POST" style="width: 700px!important;">
        <h2>Escrever comentário:</h2>
        <input type="hidden" name="id" value="<?= $row['ID']; ?>">
        <label for="texto">Texto</label>
        <input required type="text" name="texto" id="texto" placeholder="Digite seu comentário">
        <input type="submit" value="Enviar">
      </form>
    </div>

    <div class="content">
      <h1 style="margin-bottom: 20px; font-size: 1.8em;">COMENTÁRIOS</h1>
      <?php
      $sql_comentario = "SELECT * FROM comentario";
      $comentarios = $db->query($sql_comentario);
      while ($comentario = $comentarios->fetch_assoc()) {
      ?>
        <p><b>COMENTARIO: </b><?php echo $comentario['texto'] ?></p>
      <?php
      }
      ?>
      <div class="clear"></div>
    </div>
  </div>

  <footer class="container main_footer main_falha">
    <div class="content">
      <h1>FALHAS: <span style="color: #fff;">SQL Injection no Login e XSS persistent nos comentários</span></h1>
      <p style="text-align: right;"><b>Autores: </b><b style="color: #e74c3c;">Filipe A. Sampaio</b><br><b style="color: #e74c3c;">João Lucas Silva Mota</b><br><b style="color: #e74c3c;">Rodrigo Elyel Batista</b></p>
      <div class="clear"></div>
    </div>
  </footer>
</body>

</html>