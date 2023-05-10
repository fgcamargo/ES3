<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Dados da conexão
$host = "localhost";
$user = "root";
$password = "";
$database = "profitbase";

// Cria a conexão com o banco de dados
$conn = new mysqli($host, $user, $password, $database);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} else {
    $_SESSION['id_user'] = $user;
    $_SESSION['id_password'] = $password;
}
