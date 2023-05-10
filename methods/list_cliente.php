<?php

require_once '../methods/session.php';
require_once '../methods/conn.php';

validaSessao();

$stmt = $conn->prepare("SELECT id_cliente, nome, cpf, ende, num, cep, tel1, tel2, data_cadastro FROM clientes");
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows == 0) {
  echo json_encode(array('error' => 'Nenhum cliente encontrado'));
} else {
  $clientes = array();
  while ($dados = $resultado->fetch_assoc()) {
    $clientes[] = $dados;
  }
  echo json_encode($clientes);
}

$stmt->close();
$conn->close();
