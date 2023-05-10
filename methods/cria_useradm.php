<?php
// inclui o arquivo de conexão com o banco de dados
include 'conn.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Criptografar a senha em hash
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Inserir o usuário e a senha criptografada no banco de dados
  $sql = "INSERT INTO useradm (user, password) VALUES ('$username', '$hashed_password')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "Usuário criado com sucesso!";
  } else {
    echo "Erro ao criar usuário: " . mysqli_error($conn);
  }

  // Fechar a conexão com o banco de dados
  mysqli_close($conn);
} else {
  echo "Por favor, preencha o usuário e senha!";
}
