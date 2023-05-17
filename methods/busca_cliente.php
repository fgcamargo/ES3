<?php

require_once '../methods/session.php';
require_once '../methods/conn.php';

validaSessao();

$stmt = $conn->prepare("SELECT id_cliente, nome, cpf, ende, num, cep, tel1 FROM clientes");
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
    echo "<td>
    <button class='btn btn-primary'
            data-clienteid='" . $row['id_cliente'] . "'
            data-clientenome='" . $row['nome'] . "'
            data-clientecpf='" . $row['cpf'] . "'
            data-clienteendereco='" . $row['ende'] . "'
            data-clientenumero='" . $row['num'] . "'
            data-clientecep='" . $row['cep'] . "'
            data-clientetelefone='" . $row['tel1'] . "'
            onclick='selecionarCliente(this)'>Add</button>
  </td>
  ";
    echo "</tr>";
  }

  mysqli_data_seek($resultado, 0);

  $produtos = array();
  while ($dados = $resultado->fetch_assoc()) {
    $produtos[] = $dados;
  }
}


$stmt->close();
