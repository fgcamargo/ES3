<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Estilos Criado -->
  <link rel="stylesheet" href="../assets/css/index.css">

  <title>Login Profit</title>
</head>

<body>

  <div class="container">
    <div class="login-box">
      <h2>Tela de Login</h2>
      <form action="../methods/autentica.php" method="post" autocomplete="off">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" placeholder="Digite seu usuário" required>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
        <button type="submit" onclick="hideMessage()">Entrar</button>
      </form>
      <div class="error-message">
        <?php
        // Inicia a sessão
        session_start();
        // Verifica se há uma mensagem de erro na variável de sessão
        if (isset($_SESSION['error'])) {
          echo $_SESSION['error'];
          // Remove a mensagem da variável de sessão para não ser exibida novamente
          unset($_SESSION['error']);
        }
        // Verifica se há uma mensagem de sucesso na variável de sessão
        if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
          // Remove a mensagem da variável de sessão para não ser exibida novamente
          unset($_SESSION['message']);
        }
        ?>
      </div>

      <a href="#">Esqueceu sua senha?</a> ou
      <a href="#">Crie uma conta</a>
    </div>
  </div>
</body>

</html>