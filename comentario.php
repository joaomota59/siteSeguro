<?php

$mysqli = new mysqli("remotemysql.com", "kJ4MSjHlRu", "hATDyIS0nz", "kJ4MSjHlRu");

/* checando conexão */
if (mysqli_connect_errno()) {
    printf("Falha na conexão: %s\n", mysqli_connect_error());
    exit();
}

// FALHAS DO XSS
// $id = $mysqli->real_escape_string($_POST['id']);
// $texto = $mysqli->real_escape_string($_POST['texto']);

// CORREÇÃO DA FALHA SQL Injection e XSS
$id = htmlspecialchars($mysqli->real_escape_string($_POST['id']));
$texto = htmlspecialchars($mysqli->real_escape_string($_POST['texto']));

if (empty($id) || empty($texto)) {
    $mysqli->close();
    header("Location: sobreusuario.php?id=" . $id);
}

// inserindo na tabela
if ($mysqli->query("INSERT into comentario (texto) VALUES ('$texto')")) {
    printf("%d Texto inserido.\n", $mysqli->affected_rows);
    $mysqli->close();
    header("Location: sobreusuario.php?id=" . $id);
} else {
    printf("%d Erro fatal.\n");
}
