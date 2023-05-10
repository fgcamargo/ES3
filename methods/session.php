<?php
session_start();

function validaSessao()
{
  // Verifica se o usuário está logado
  if (!isset($_SESSION['id_user']) and !isset($_SESSION['id_password'])) {
    header('Location: ../pages/index.php'); // Redireciona para a página de login
    exit();
  }
}
