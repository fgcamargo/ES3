<?php

require_once '../methods/session.php';
require_once '../methods/conn.php';

validaSessao();

$stmt = $conn->prepare("SELECT id_produto, nome, preco, tipo, descricao, qnt_estoque FROM produto");
$stmt->execute();
$resultado = $stmt->get_result();



if ($resultado->num_rows == 0) {
  echo "<tr><td colspan='5'>Nenhum Produto encontrado</td></tr>";
} else {
  while ($row = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id_produto'] . "</td>";
    echo "<td>" . $row['nome'] . "</td>";
    echo "<td>" . $row['preco'] . "</td>";
    echo "<td>" . $row['tipo'] . "</td>";
    echo "<td>" . $row['descricao'] . "</td>";
    echo "<td>" . $row['qnt_estoque'] . "</td>";
    echo "<td> <button class='btn btn-warning' data-toggle='modal' data-target='#exampleModal' data-whateverid='" . $row['id_produto'] . "' data-whatevernome='" . $row['nome'] . "' data-whateverpreco='" . $row['preco'] . "' data-whatevertipo='" . $row['tipo'] . "' data-whateverdescrip='" . $row['descricao'] . "' data-whateverqntesq='" . $row['qnt_estoque'] . "'>Editar</button>  <button class='btn btn-danger' data-toggle='modal' data-target='#deleteModal' data-whateverid='" . $row['id_produto'] . "'>Excluir</button></td>";
    echo "</tr>";
  }

  mysqli_data_seek($resultado, 0);

  $produtos = array();
  while ($dados = $resultado->fetch_assoc()) {
    $produtos[] = $dados;
  }
}


$stmt->close();
$conn->close();
