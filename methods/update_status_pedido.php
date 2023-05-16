<?php
require_once '../methods/session.php';
require_once '../methods/conn.php';

validaSessao();


$idPedido = mysqli_real_escape_string($conn, $_POST['pedidoId']);
$novoStatus = mysqli_real_escape_string($conn, $_POST['novostatus']);

$mensagem = '';


if (!empty($idPedido)) {
  // atualiza o status na tabela
  $sql = "UPDATE pedidos SET status = '$novoStatus' WHERE id_pedido = '$idPedido'";

  if ($conn->query($sql) === TRUE) {
    // a atualização foi bem sucedida
    $mensagem = "Status do Pedido atualizado com sucesso!";

    if (mysqli_affected_rows($conn) != 0) {
      echo "
        <META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/engenharia/pages/pedidos.php'>
        <script type=\"text/javascript\">
          alert(\"Status do pedido alterado com sucesso.\");
        </script>
      ";
    } else {
      echo "
        <META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/engenharia/pages/pedidos.php'>
        <script type=\"text/javascript\">
          alert(\"Não foi possível alterar o status do pedido.\");
        </script>
      ";
    }
  } else {
    // ocorreu um erro ao atualizar o status do pedido
    $mensagem = "Erro ao atualizar o status do pedido: " . $conn->error;
  }
} else {
  // o ID do pedido está vazio, então não podemos atualizar o status
  $mensagem = "Erro ao atualizar o status do pedido: ID inválido";
}

$conn->close();
