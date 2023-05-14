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

  <!-- Bootstrap-->
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

  <!-- Estilos Criado -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/header.css">
  <link rel="stylesheet" href="../assets/css/navbar.css">
  <link rel="stylesheet" href="../assets/css/pedidos.css">
  <link rel="stylesheet" href="../assets/css/footer.css">


  <title>Profit - Pedidos</title>

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
  <div class="custom-navbar">
    <nav class="navbar">
      <ul class="navbar-nav" collapsed>
        <li class="nav-item">
          <a href="../pages/home.php" class="nav-link">
            <ion-icon name="home-outline"></ion-icon>
            <span class="nav-link-text">Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="../pages/caixa.php" class="nav-link">
            <ion-icon name="cart-outline"></ion-icon>
            <span class="nav-link-text">Caixa</span>
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
  </div>

  <section class="cliente">
    <div class="row">
      <div class="col-md-6">
        <table class="table table-striped table-aceito">
          <h1>Pedidos Aceito</h1>
          <thead>
            <tr>
              <th>Numero do Pedido</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>Total</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once '../methods/list_pedidos.php';
            listarPedidos('Aceito');
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <table class="table table-striped table-preparo">
          <h1>Pedidos em Preparo</h1>
          <thead>
            <tr>
              <th>Numero do Pedido</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>Total</th>
              <th>Tipo de Entrega</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once '../methods/list_pedidos.php';
            listarPedidos('Em preparo');
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <section class="cliente">
    <div class="row">
      <div class="col-md-4">
        <table class="table table-striped table-retirada">
          <h1>Aguardado Retirada</h1>
          <thead>
            <tr>
              <th>Numero do Pedido</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>Total</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once '../methods/list_pedidos.php';
            listarPedidos('Retirada');
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <table class="table table-striped table-entrega">
          <h1>Saiu para Entrega</h1>
          <thead>
            <tr>
              <th>Numero do Pedido</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>Total</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once '../methods/list_pedidos.php';
            listarPedidos('Saiu para entrega');
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <table class="table table-striped table-finalizado">
          <h1>Finalizados</h1>
          <thead>
            <tr>
              <th>Numero do Pedido</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>Total</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once '../methods/list_pedidos.php';
            listarPedidos('Finalizado');
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <section class="cliente">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-cancelado">
          <h1>Pedidos Cancelados</h1>
          <thead>
            <tr>
              <th>Numero do Pedido</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>Total</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once '../methods/list_pedidos.php';
            listarPedidos('Cancelado');
            ?>
          </tbody>
        </table>
      </div>
    </div>
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


  <!-- Script Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

  <!-- Script para Formata tela de Cadastro -->

  <script src="../assets/js/script_pedidos.js"></script>

  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>