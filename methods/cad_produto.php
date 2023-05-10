<?php
require_once '../methods/session.php';
require_once '../methods/conn.php';

validaSessao();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtém os dados do formulário
  $nome = $_POST['nome'];
  $preco = $_POST['preco'];
  $quantidade = $_POST['quantidade'];

  // Verifica se o preço e a quantidade são números
  if (!is_numeric($preco) || !is_numeric($quantidade)) {
    // Inicia a sessão
    session_start();
    // Define uma variável de sessão com a mensagem de erro
    $_SESSION['error'] = array('tipo' => 'cadastrar', 'mensagem' => 'Preço e quantidade devem ser números.');
    // Redireciona para a página de cadastro de produtos
    header('Location: ../pages/cad_produto.php');
    exit();
  }

  // Prepara a query de inserção
  $stmt = $conn->prepare("INSERT INTO produtos (nome, preco, quantidade) VALUES (?, ?, ?)");

  // Executa a query de inserção com os parâmetros
  $stmt->bind_param("sss", $nome, $preco, $quantidade);
  $resultado = $stmt->execute();

  if (!$resultado) {
    $erro = $conn->error;
    if (strpos($erro, 'Duplicate entry') !== false) { // Verifica se o erro é de nome duplicado
      // Inicia a sessão
      session_start();
      // Define uma variável de sessão com a mensagem de erro
      $_SESSION['error'] = array('tipo' => 'cadastrar', 'mensagem' => 'Já existe um registro com o nome informado.');
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

  // Redireciona para a página de cadastro de produtos
  header('Location: ../pages/cad_produto.php');
  exit();
}
