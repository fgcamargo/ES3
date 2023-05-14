<?php
// Inclui os arquivos necessários para a execução do código
require_once '../methods/session.php';
require_once '../methods/conn.php';

// Verifica se há uma sessão válida
validaSessao();

// Escapa as variáveis recebidas por POST para evitar ataques de SQL injection
$nome = mysqli_real_escape_string($conn, $_POST['nomeCliente']);
$cpf = mysqli_real_escape_string($conn, $_POST['cpfCliente']);
$ende = mysqli_real_escape_string($conn, $_POST['endeCliente']);
$num = mysqli_real_escape_string($conn, $_POST['numCliente']);
$cep = mysqli_real_escape_string($conn, $_POST['cepCliente']);
$tel1 = mysqli_real_escape_string($conn, $_POST['tel1Cliente']);
$tel2 = mysqli_real_escape_string($conn, $_POST['tel2Cliente']);

// Cria uma variável vazia para armazenar mensagens de erro ou sucesso
$mensagem = '';

// Verifica se o CPF já foi cadastrado na tabela de clientes
$sql_verifica_cpf = "SELECT COUNT(*) as count FROM clientes WHERE cpf = '$cpf'";
$result_verifica_cpf = $conn->query($sql_verifica_cpf);

if ($result_verifica_cpf->num_rows > 0) {
  $row_verifica_cpf = $result_verifica_cpf->fetch_assoc();
  $count = $row_verifica_cpf['count'];
  if ($count > 0) {
    // CPF já cadastrado, exibe mensagem de erro e encerra o script
    $mensagem = "CPF já cadastrado no sistema!";
    echo "
      <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/engenharia/pages/clientes.php'>
      <script type=\"text/javascript\">
        alert(\"$mensagem\");
      </script>
    ";
    $conn->close();
    exit();
  }
}

// Insere os dados na tabela de clientes
$sql = "INSERT INTO clientes (nome, cpf, ende, num, cep, tel1, tel2 ) VALUES ('$nome','$cpf','$ende','$num','$cep', '$tel1', '$tel2')";

if ($conn->query($sql) === TRUE) {
  // Cadastro foi bem sucedido, exibe mensagem de sucesso em um popup e redireciona para a página de clientes
  $mensagem = "Cliente registrado com sucesso!";
  echo "
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/engenharia/pages/clientes.php'>
    <script type=\"text/javascript\">
      alert(\"$mensagem\");
    </script>
  ";
} else {
  // Ocorreu um erro ao inserir o registro, exibe mensagem de erro
  $mensagem = "Erro ao cadastrar cliente: " . $conn->error;
  echo "
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/engenharia/pages/clientes.php'>
    <script type=\"text/javascript\">
      alert(\"$mensagem\");
    </script>
  ";
}

// Fecha a conexão com o banco de dados
$conn->close();
