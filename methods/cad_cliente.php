<?php

require_once '../methods/session.php';
require_once '../methods/conn.php';

validaSessao();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtém os dados do formulário
  $nome = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $ende = $_POST['ende'];
  $num = $_POST['num'];
  $cep = $_POST['cep'];
  $tel1 = $_POST['tel1'];
  $tel2 = $_POST['tel2'];

  // Prepara a query de inserção
  $stmt = $conn->prepare("INSERT INTO clientes (nome, cpf, ende, num, cep, tel1, tel2) VALUES (?, ?, ?, ?, ?, ?, ?)");

  // Executa a query de inserção com os parâmetros
  $stmt->bind_param("sssssss", $nome, $cpf, $ende, $num, $cep, $tel1, $tel2);
  $resultado = $stmt->execute();

  if (!$resultado) {
    $erro = $conn->error;
    if (strpos($erro, 'Duplicate entry') !== false) { // Verifica se o erro é de CPF duplicado
      // Inicia a sessão
      session_start();
      // Define uma variável de sessão com a mensagem de erro
      $_SESSION['error'] = array('tipo' => 'cadastrar', 'mensagem' => 'Já existe um registro com o CPF informado.');
    } else {
      // Inicia a sessão
      session_start();
      // Define uma variável de sessão com a mensagem de erro
      $_SESSION['error'] = array('tipo' => 'cadastrar', 'mensagem' => 'Ocorreu um erro ao inserir o registro: ' . $erro);
    }
  } else {
    // Inicia a sessão
    session_start();
    // Define uma variável de sessão com a mensagem de sucesso
    $_SESSION['message'] = array('tipo' => 'cadastrar', 'mensagem' => 'Cadastro realizado com sucesso!');
  }

  // Redireciona para a página de cadastro de clientes
  header('Location: ../pages/clientes.php');
  exit();
}
