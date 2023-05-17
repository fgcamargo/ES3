<?php

require_once '../methods/session.php';
require_once '../methods/conn.php';

validaSessao();

$stmt = $conn->prepare("SELECT id_pedido, id_produto, quantidade FROM itens_pedido");
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows == 0) {
  echo "<tr><td colspan='4'>Nenhum Item do Pedido encontrado</td></tr>";
} else {
  while ($row = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id_pedido'] . "</td>";
    echo "<td>" . $row['id_produto'] . "</td>";

    // Obter o nome do produto com base no id_produto
    $stmtProduto = $conn->prepare("SELECT nome FROM produtos WHERE id_produto = ?");
    $stmtProduto->bind_param("i", $row['id_produto']);
    $stmtProduto->execute();
    $resultadoProduto = $stmtProduto->get_result();
    
    if ($resultadoProduto->num_rows > 0) {
      $produto = $resultadoProduto->fetch_assoc();
      echo "<td>" . $produto['nome'] . "</td>";
    } else {
      echo "<td>Produto não encontrado</td>";
    }

    echo "<td>" . $row['quantidade'] . "</td>";
    echo "</tr>";
  }
}

$stmt->close();
$conn->close();
