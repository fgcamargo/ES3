<?php
require_once '../methods/session.php';
require_once '../methods/conn.php';

validaSessao();

$nome = mysqli_real_escape_string($conn, $_POST['nomeCliente']);
$cpf = mysqli_real_escape_string($conn, $_POST['cpfCliente']);
$ende = mysqli_real_escape_string($conn, $_POST['endeCliente']);
$num = mysqli_real_escape_string($conn, $_POST['numCliente']);
$cep = mysqli_real_escape_string($conn, $_POST['cepCliente']);
$tel1 = mysqli_real_escape_string($conn, $_POST['tel1Cliente']);
$tel2 = mysqli_real_escape_string($conn, $_POST['tel2Cliente']);

$mensagem = '';


// insere os dados na tabela
$sql = "INSERT INTO clientes (nome, cpf, ende, num, cep, tel1, tel2 ) VALUES ('$nome','$cpf','$$ende','$num','$cep', '$tel1', '$tel2')";

if ($conn->query($sql) === TRUE) {
  // Cadastro foi bem sucedido
  $mensagem = "Cliente registro cadastrado com sucesso!";

  if (mysqli_affected_rows($conn) != 0) {
    echo "
      <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/engenharia/pages/clientes.php'>
      <script type=\"text/javascript\">
        alert(\"Cliente registrado com sucesso.\");
      </script>
    ";
  } else {
    echo "
      <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/engenharia/pages/clientes.php'>
      <script type=\"text/javascript\">
        alert(\"Não foi possível registrar cliente no sistema.\");
      </script>
    ";
  }
} else {
  // ocorreu um erro ao inserir o registro
  $mensagem = "Erro ao cadastrar cliente: " . $conn->error;
}

$conn->close();
