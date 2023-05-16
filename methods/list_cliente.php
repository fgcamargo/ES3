<?php

require_once '../methods/session.php';
require_once '../methods/conn.php';

validaSessao();

$stmt = $conn->prepare("SELECT id_cliente, nome, cpf, ende, num, cep, tel1, tel2, data_cadastro FROM clientes");
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows == 0) {
  echo "<tr><td colspan='5'>Nenhum Cliente encontrado</td></tr>";
} else {
  while ($row = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id_cliente'] . "</td>";
    echo "<td>" . $row['nome'] . "</td>";
    echo "<td>" . $row['cpf'] . "</td>";
    echo "<td>" . $row['ende'] . "</td>";
    echo "<td>" . $row['num'] . "</td>";
    echo "<td>" . $row['cep'] . "</td>";
    echo "<td>" . $row['tel1'] . "</td>";
    echo "<td>" . $row['tel2'] . "</td>";
    echo "<td>" . $row['data_cadastro'] . "</td>";
    echo "<td> <button class='btn btn-warning' data-toggle='modal' data-target='#exampleModal' data-whateverid='" . $row['id_cliente'] . "' data-whatevernome='" . $row['nome'] . "' data-whatevercpf='" . $row['cpf'] . "' data-whateverende='" . $row['ende'] . "' data-whatevernum='" . $row['num'] . "' data-whatevercep='" . $row['cep'] . "' data-whatevertel1='" . $row['tel1'] . "'data-whatevertel2='" . $row['tel2'] . "'data-whatevercadastro='" . $row['data_cadastro'] . "'><ion-icon name='pencil'></ion-icon></button>  <button class='btn btn-danger' data-toggle='modal' data-target='#deleteModal' data-whateverid='" . $row['id_cliente'] . "'><ion-icon name='trash'></ion-icon></button></td>";
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
