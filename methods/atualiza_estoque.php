<?php
require_once '../methods/session.php';
require_once '../methods/conn.php';

// Verifica se os parâmetros foram fornecidos
if (!isset($_POST['idProduto']) || !isset($_POST['novaQuantidade'])) {
  echo "Parâmetros inválidos.";
  exit;
}

$idProduto = $_POST['idProduto'];
$novaQuantidade = $_POST['novaQuantidade'];

// Atualiza o estoque do produto no banco de dados
$stmt = $conn->prepare("UPDATE produtos SET qnt_estoque = ? WHERE id_produto = ?");
$stmt->bind_param("ii", $novaQuantidade, $idProduto);
$stmt->execute();

if ($stmt->affected_rows <= 0) {
  echo "Erro ao atualizar o estoque.";
}

$stmt->close();
$conn->close();
