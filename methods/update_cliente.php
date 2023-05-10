
<?php
require_once '../methods/session.php';
require_once '../methods/conn.php';

validaSessao();

$id = mysqli_real_escape_string($conn, $_POST['idCliente']);
$nome = mysqli_real_escape_string($conn, $_POST['nomeCliente']);
$cpf = mysqli_real_escape_string($conn, $_POST['cpfCliente']);
$ende = mysqli_real_escape_string($conn, $_POST['endeCliente']);
$num = mysqli_real_escape_string($conn, $_POST['numCliente']);
$cep = mysqli_real_escape_string($conn, $_POST['cepCliente']);
$tel1 = mysqli_real_escape_string($conn, $_POST['tel1Cliente']);
$tel2 = mysqli_real_escape_string($conn, $_POST['tel2Cliente']);


$mensagem = '';


if (!empty($id)) {
  // atualiza os dados na tabela
  $sql = "UPDATE clientes SET nome = '$nome', cpf = '$cpf', ende = '$ende ', num = '$num', cep = '$cep', tel1= '$tel1', tel2 = '$tel2' WHERE id_cliente = '$id'";

  if ($conn->query($sql) === TRUE) {
    // a atualização foi bem sucedida
    $mensagem = "Registro do Cliente atualizado com sucesso!";

    if (mysqli_affected_rows($conn) != 0) {
      echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/engenharia/pages/clientes.php'>
        <script type=\"text/javascript\">
          alert(\"Registro do cliente alterado com sucesso.\");
        </script>
      ";
    } else {
      echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/engenharia/pages/clientes.php'>
        <script type=\"text/javascript\">
          alert(\"Não foi possível alterar o registro do Cliente.\");
        </script>
      ";
    }
  } else {
    // ocorreu um erro ao atualizar o registro
    $mensagem = "Erro ao atualizar o registro do cliente: " . $conn->error;
  }
} else {
  // o ID está vazio, então não podemos atualizar o registro
  $mensagem = "Erro ao atualizar o registro: ID inválido";
}

$conn->close();
