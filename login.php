<?php
session_start(); // Inicia a sessão

$db = new mysqli("remotemysql.com", "kJ4MSjHlRu", "hATDyIS0nz", "kJ4MSjHlRu");

//   FALHA DO SQL Injection
// $L = $_POST['login'];
// $S = $_POST['senha'];

//   // CORREÇÃO DA FALHA SQL Injection e XSS
$L = htmlspecialchars($db->real_escape_string($_POST['login']));
$S = htmlspecialchars($db->real_escape_string($_POST['senha']));

if (empty($L) || empty($S)) {
  $db->close();
  header("Location: index.php");
}

$sql = "SELECT * FROM usuario WHERE login = '$L' AND senha = '$S'"; //1' or '1' = '1
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$_SESSION['user'] = $row['login'];

if ($row) {
  header("Location: sobreusuario.php?id=" . $row['ID']);
} else {
  $_SESSION['msg'] = "<p style='margin: 10px; color: red; font-weight: bold;'>Tente novamente !</p>";
  header("Location: index.php");
}

mysqli_close($link);
