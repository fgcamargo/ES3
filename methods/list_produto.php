<?php

require_once '../methods/session.php';
require_once '../methods/conn.php';

validaSessao();

$stmt = $conn->prepare("SELECT id_produto, nome, preco, tipo, descricao, qnt_estoque FROM produto");
$stmt->execute();
$resultado = $stmt->get_result();



echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nome</th>";
echo "<th>Descrição</th>";
echo "<th>Preço</th>";
echo "<th>Ações</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// Loop para percorrer os resultados e exibir na tabela
if ($resultado->num_rows == 0) {
  echo "<tr><td colspan='5'>Nenhum Produto encontrado</td></tr>";
} else {
  while ($row = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id_produto'] . "</td>";
    echo "<td>" . $row['nome'] . "</td>";
    echo "<td>" . $row['descricao'] . "</td>";
    echo "<td>" . $row['preco'] . "</td>";
    echo "<td> <button class='View' data-id='" . $row['id_produto'] . "'>View</button> | <button class='editar' data-id='" . $row['id_produto'] . "'>Editar</button> | <button class='Excluir' data-id='" . $row['id_produto'] . "'>Excluir</button></td>";
    echo "</tr>";
  }

  mysqli_data_seek($resultado, 0);

  $produtos = array();
  while ($dados = $resultado->fetch_assoc()) {
    $produtos[] = $dados;
  }
}

echo "</tbody>";
echo "</table>";

$stmt->close();
$conn->close();
