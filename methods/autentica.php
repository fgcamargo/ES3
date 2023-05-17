<?php
// inclui o arquivo de conexão com o banco de dados
include 'conn.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Consultar o usuário no banco de dados
  $sql = "SELECT * FROM useradm WHERE user = '$username'";
  $result = mysqli_query($conn, $sql);

  // Variável de sinalização
  $user_found = false;

  if ($result) {
    // Verificar se o usuário existe
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $hashed_password = $row['password'];
      // Verificar se a senha está correta
      if (password_verify($password, $hashed_password)) {
        $user_found = true;
        // Inicia a sessão
        session_start();
        // Define uma variável de sessão com a mensagem de sucesso
        $_SESSION['message'] = 'Login realizado com sucesso!';
        header('Location: ../pages/caixa.php');
        exit();
      } else {
        // Inicia a sessão
        session_start();
        // Define uma variável de sessão com a mensagem de erro
        $_SESSION['error'] = 'Usuário ou senha incorreta!';
        header('Location: ../pages/index.php');
        exit();
      }
    } else {
      // Inicia a sessão
      session_start();
      // Define uma variável de sessão com a mensagem de erro
      $_SESSION['error'] = 'Usuário ou senha incorreta!';
      header('Location: ../pages/index.php');
      exit();
    }
  } else {
    // Inicia a sessão
    session_start();
    // Define uma variável de sessão com a mensagem de erro
    $_SESSION['error'] = 'Erro ao consultar usuário!';
    header('Location: ../pages/index.php');
    exit();
  }
}
