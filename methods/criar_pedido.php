<?php
// Inclui os arquivos necessários para a execução do código
require_once 'session.php';
require_once 'conn.php';

// Verifica se os dados do pedido foram recebidos corretamente
$data = file_get_contents('php://input');
$pedido = json_decode($data, true);

if (!$pedido) {
  http_response_code(400);
  echo json_encode(['message' => 'Dados do pedido inválidos.']);
  exit;
}

// Obtém os dados do pedido
$idCliente = $pedido['id_cliente'];
$status = 'Recebido';
$valorTotal = $pedido['valor_total'];
$tipoEntrega = $pedido['tipo_entrega'];
$formaPagamento = $pedido['forma_pagamento'];
$observacao = $pedido['observacao'];
$dataHora = $pedido['data_hora']; // Já está em formato de data e hora

try {
  // Inicia a transação
  $conn->begin_transaction();

  // Prepara a consulta para inserir o pedido na tabela "Pedido"
  $stmtPedido = $conn->prepare("INSERT INTO pedidos (id_cliente, status, valor_total, tipo_entrega, forma_pagamento, observacao, data_hora)
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmtPedido->bind_param("isdssss", $idCliente, $status, $valorTotal, $tipoEntrega, $formaPagamento, $observacao, $dataHora);
  $stmtPedido->execute();

  // Obtém o ID do pedido inserido
  $idPedido = $stmtPedido->insert_id;


  // Prepara a consulta para inserir os itens do pedido na tabela "ItensPedido"
  $stmtItensPedido = $conn->prepare("INSERT INTO itens_pedido (id_pedido, id_produto, quantidade)
                                     VALUES (?, ?, ?)");

  // Insere os itens do pedido na tabela "ItensPedido"
  $itensPedido = $pedido['itensPedido'];
  foreach ($itensPedido as $item) {
    $idProduto = $item['id_produto'];
    $quantidade = $item['quantidade'];
    $stmtItensPedido->bind_param("iii", $idPedido, $idProduto, $quantidade);
    $stmtItensPedido->execute();
  }

  // Confirma a transação
  $conn->commit();

  // Responde com sucesso
  http_response_code(200);
  echo json_encode(['message' => 'Pedido criado com sucesso.']);
} catch (Exception $e) {
  // Desfaz a transação em caso de erro
  $conn->rollback();

  // Responde com erro
  http_response_code(500);
  echo json_encode(['message' => 'Erro ao criar o pedido.']);
}

// Fecha as consultas e a conexão com o banco de dados
$stmtPedido->close();
$stmtItensPedido->close();
$conn->close();
