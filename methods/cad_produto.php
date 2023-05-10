
<?php
require_once '../methods/session.php';
require_once '../methods/conn.php';

validaSessao();

$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$preco = mysqli_real_escape_string($conn, $_POST['preco']);
$tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
$estoque = mysqli_real_escape_string($conn, $_POST['estoque']);
$descricao = mysqli_real_escape_string($conn, $_POST['descricao']);


$mensagem = '';


// insere os dados na tabela
$sql = "INSERT INTO produto (nome, preco, tipo, descricao, qnt_estoque) VALUES ('$nome','$preco','$tipo','$descricao','$estoque')";

if ($conn->query($sql) === TRUE) {
  // Cadastro foi bem sucedido
  $mensagem = "Registro cadastrado com sucesso!";

  if (mysqli_affected_rows($conn) != 0) {
    echo "
      <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/engenharia/pages/produtos.php'>
      <script type=\"text/javascript\">
        alert(\"Produto cadastrado com sucesso.\");
      </script>
    ";
  } else {
    echo "
      <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/engenharia/pages/produtos.php'>
      <script type=\"text/javascript\">
        alert(\"Não foi possível cadastrar o produto.\");
      </script>
    ";
  }
} else {
  // ocorreu um erro ao inserir o registro
  $mensagem = "Erro ao cadastrar o produto: " . $conn->error;
}

$conn->close();
