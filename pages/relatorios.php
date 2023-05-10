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
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/header.css">
  <link rel="stylesheet" href="../assets/css/navbar.css">
  <link rel="stylesheet" href="../assets/css/section.css">
  <link rel="stylesheet" href="../assets/css/footer.css">


  <title>Profit - Relatórios</title>

</head>

<body>

  <header>
    <div class="header-container">
      <a href="#" class="logo">
        <img src="../assets/img/blue.png" alt="Logo da Lanchonete Profit">
      </a>
      <div class="header-text">
        <h2>Sistema de Pedidos e Gerenciamento</h2>
      </div>
    </div>
  </header>

  <!-- Barra de Navegação -->
  <nav class="navbar">
    <ul class="navbar-nav" collapsed>
      <li class="nav-item">
        <a href="../pages/home.php" class="nav-link">
          <ion-icon name="home-outline"></ion-icon>
          <span class="nav-link-text">Home</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="../pages/pedidos.php" class="nav-link">
          <ion-icon name="bag-handle-outline"></ion-icon>
          <span class="nav-link-text">Pedidos</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="../pages/clientes.php" class="nav-link">
          <ion-icon name="person-add-outline"></ion-icon>
          <span class="nav-link-text">Clientes</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="../pages/produtos.php" class="nav-link">
          <ion-icon name="fast-food-outline"></ion-icon>
          <span class="nav-link-text">Produtos</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="../pages/relatorios.php" class="nav-link">
          <ion-icon name="document-text-outline"></ion-icon>
          <span class="nav-link-text">Relatórios</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="../pages/configuracao.php" class="nav-link">
          <ion-icon name="settings-outline"></ion-icon>
          <span class="nav-link-text">Configurações</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="../pages/logout.php" class="nav-link">
          <ion-icon name="log-out-outline"></ion-icon>
          <span class="nav-link-text">Sair</span>
        </a>
      </li>
    </ul>
  </nav>

  <section>
    <h1>teste</h1>
  </section>

  <footer>
    <div class="footer-container">
      <div class="footer-column">
        <h3>Contato</h3>
        <ul>
          <li>Telefone: (11) 1234-5678<br>Email: contato@lanchoneteprofit.com<br>Endereço: Rua A, 123 - São Paulo, SP</li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Redes Sociais</h3>
        <ul>
          <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a><a href="#"><ion-icon name="logo-instagram"></ion-icon></a><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Sobre Nós</h3>
        <p>A Lanchonete Profit é uma empresa que se preocupa em oferecer o melhor para seus clientes. Com ingredientes frescos e um atendimento diferenciado, nossa lanchonete é a melhor opção para quem busca qualidade e sabor.</p>
      </div>
    </div>
  </footer>


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>