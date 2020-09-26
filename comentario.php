<?php

$mysqli = new mysqli("localhost", "filipe", "12345678", "LAB");

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

// inserindo na tabela
if ($mysqli->query("INSERT into comentario (texto) VALUES ('$texto')")) {
    printf("%d Texto inserido.\n", $mysqli->affected_rows);
    $mysqli->close();
    header("Location: sobreusuario.php?id=".$id);
} else{
    printf("%d Erro fatal.\n");
}
