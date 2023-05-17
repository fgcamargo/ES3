<?php
require_once '../methods/session.php';
require_once '../methods/conn.php';

function listarProdutos($tipoProduto)
{
  global $conn;

  $stmt = $conn->prepare("SELECT id_produto, nome, qnt_estoque, preco, tipo, situacao, descricao FROM produtos WHERE tipo = ?");
  $stmt->bind_param("s", $tipoProduto);
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($resultado->num_rows == 0) {
    echo "<tr><td colspan='4'>Nenhum Produto encontrado</td></tr>";
  } else {
    while ($row = $resultado->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['id_produto'] . "</td>";
      echo "<td>" . $row['nome'] . "</td>";
      echo "<td>" . $row['qnt_estoque'] . "</td>";
      echo "<td>" . $row['preco'] . "</td>";
      echo "<td><input type='number' id='quantidade-" . $row['id_produto'] . "' class='quantidade-input'></td>";
      echo "<td>
  <button class='btn btn-primary' onclick='adicionarProduto(" . $row['id_produto'] . ", " . $row['qnt_estoque'] . ", \"" . $row['tipo'] . "\", \"" . $row['situacao'] . "\", \"" . $row['descricao'] . "\", " . $row['preco'] . ", \"" . $row['nome'] . "\")'>Add</button>
</td>";
      echo "</tr>";
    }
  }

  mysqli_data_seek($resultado, 0);
  $produtos = array();
  while ($dados = $resultado->fetch_assoc()) {
    $produtos[] = $dados;
  }
}
