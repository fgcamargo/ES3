<?php
require_once '../methods/session.php';
require_once '../methods/conn.php';

// Verifica se a sessão é válida
validaSessao();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


if (!empty($id)) {
  $stmt = $conn->prepare("DELETE FROM clientes WHERE id_cliente=?");
  $stmt->bind_param('i', $id);

  $resultado = $stmt->execute();


  if (!$resultado) {
    $erro = $conn->error;;
    // Define uma variável de sessão com a mensagem de erro
    $_SESSION['error'] = array('tipo' => 'excluir', 'mensagem' => 'Não foi possível excluir registro de usuario! ' . $erro);
  } else {

    // Define uma variável de sessão com a mensagem de sucesso
    $_SESSION['message'] = array('tipo' => 'excluir', 'mensagem' => 'Registro de usuário excluido com sucesso!');
  }

  $erro = $conn->error;

  // Define uma variável de sessão com a mensagem de erro
  $_SESSION['error'] = array('tipo' => 'excluir', 'mensagem' => 'Nenhum registro de usuário encontrado: ' . $erro);
}

echo json_encode(['resultado' => $resultado]);
