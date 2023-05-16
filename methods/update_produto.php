
<?php
require_once '../methods/session.php';
require_once '../methods/conn.php';

validaSessao();

$id = mysqli_real_escape_string($conn, $_POST['id']);
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$preco = mysqli_real_escape_string($conn, $_POST['preco']);
$tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
$estoque = mysqli_real_escape_string($conn, $_POST['estoque']);
$descricao = mysqli_real_escape_string($conn, $_POST['descricao']);


$mensagem = '';


if (!empty($id)) {
  // atualiza os dados na tabela
  $sql = "UPDATE produtos SET nome = '$nome', preco = '$preco', tipo = '$tipo', descricao = '$descricao', qnt_estoque = '$estoque' WHERE id_produto = '$id'";

  if ($conn->query($sql) === TRUE) {
    // a atualização foi bem sucedida
    $mensagem = "Registro atualizado com sucesso!";

    if (mysqli_affected_rows($conn) != 0) {
      echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/engenharia/pages/produtos.php'>
        <script type=\"text/javascript\">
          alert(\"Produto alterado com sucesso.\");
        </script>
      ";
    } else {
      echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/engenharia/pages/produtos.php'>
        <script type=\"text/javascript\">
          alert(\"Não foi possível alterar o produto.\");
        </script>
      ";
    }
  } else {
    // ocorreu um erro ao atualizar o registro
    $mensagem = "Erro ao atualizar o registro: " . $conn->error;
  }
} else {
  // o ID está vazio, então não podemos atualizar o registro
  $mensagem = "Erro ao atualizar o registro: ID inválido";
}

$conn->close();
