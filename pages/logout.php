<?php
// Inclui o arquivo que mantém a sessão


require_once('../methods/session.php');

validaSessao();



// Limpa o buffer de redirecionamento
ob_start();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Estilos Criado -->
  <link rel="stylesheet" href="../assets/css/logout.css">


  <title>Logout Profit</title>

</head>

<body>
  <div class="container">
    <div class="box">
      <h2>Deslogado</h2>
      <p>Você foi desconectado com sucesso!</p>
      <button type="submit" onclick="window.location.href='../pages/index.php'">Voltar para a página de login</button>
    </div>
  </div>
</body>



</html>