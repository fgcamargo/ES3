<?php
require_once '../methods/session.php';
require_once '../methods/conn.php';

validaSessao();

$id = mysqli_real_escape_string($conn, $_POST['id']);


if (isset($_POST['id'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);

  if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
  }

  $sql = "DELETE FROM produtos WHERE id_produto = $id";

  if ($conn->query($sql) === TRUE) {
    // exclusão foi bem sucedida
    $affected_rows = mysqli_affected_rows($conn);
    if ($affected_rows != -1 && $affected_rows != 0) {
      echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/engenharia/pages/produtos.php'>
        <script type=\"text/javascript\">
          alert(\"Produto excluído com sucesso.\");
        </script>
      ";
    } else {
      echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/engenharia/pages/produtos.php'>
        <script type=\"text/javascript\">
          alert(\"Não foi possível excluir o produto.\");
        </script>
      ";
    }
  } else {
    // ocorreu um erro ao excluir o registro
    echo "
      <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/engenharia/pages/produtos.php'>
      <script type=\"text/javascript\">
        alert(\"Erro ao excluir o produto: " . $conn->error . "\");
      </script>
    ";
  }

  $conn->close();
}
