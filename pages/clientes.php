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
  <link rel="stylesheet" href="../assets/css/cliente.css">
  <link rel="stylesheet" href="../assets/css/footer.css">

  <title>Profit - Cliente</title>

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
        <a href="../methods/logout.php" class="nav-link">
          <ion-icon name="log-out-outline"></ion-icon>
          <span class="nav-link-text">Sair</span>
        </a>
      </li>
    </ul>
  </nav>


  <section id="section2">
    <h2 class="section-titulo">Cadastro de Cliente</h2>
    <form method="POST" action="../methods/cad_cliente.php">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" class="cpf-mask" required>
      </div>

      <div class="form-group">
        <label for="endereco">Endereço:</label>
        <input type="text" id="ende" name="ende" required>
      </div>

      <div class="form-group">
        <label for="numero">Número:</label>
        <input type="text" id="num" name="num" required>
        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" class="cep-mask" required>
      </div>

      <div class="form-group">
        <label for="tel1">Tel 1:</label>
        <input type="tel" id="tel1" name="tel1" class="phone-mask" required>
        <label for="tel2">Tel 2:</label>
        <input type="tel" id="tel2" name="tel2" class="phone-mask">
      </div>
      <div class="form-buttons3">
        <button type="submit" id="enviar-button">Enviar</button>
      </div>
      <div class="error-message">
    </form>
    <div class="message-container-cadastrar">
      <?php
      require_once '../methods/session.php';
      validaSessao();

      // Verifica se há mensagens de erro ou sucesso de cadastro
      if (isset($_SESSION['error']) && $_SESSION['error']['tipo'] === 'cadastrar') {
        $mensagem = $_SESSION['error']['mensagem'];
        unset($_SESSION['error']);
        $tipo = 'error';
      } else if (isset($_SESSION['message']) && $_SESSION['message']['tipo'] === 'cadastrar') {
        $mensagem = $_SESSION['message']['mensagem'];
        unset($_SESSION['message']);
        $tipo = 'success';
      }

      // Exibe a mensagem, se houver
      if (isset($mensagem)) {
        echo "<div class=\"$tipo-message\">$mensagem</div>";
      }
      ?>

    </div>
  </section>




  <section class="lista-clientes" id="section1">
    <h2 class="section-titulo">Lista de Clientes</h2>
    <table class="table-clientes">
      <div class="search-box">
        <input type="text" id="search-input" placeholder="Pesquisar...">
        <ion-icon name="search-circle-outline" class="search-icon"></ion-icon>
      </div>

      <div class="message-container-excluir">
        <?php
        require_once '../methods/session.php';
        validaSessao();

        // Verifica se há mensagens de erro ou sucesso de cadastro
        if (isset($_SESSION['error']) && $_SESSION['error']['tipo'] === 'excluir') {
          $mensagem = $_SESSION['error']['mensagem'];
          unset($_SESSION['error']);
          $tipo = 'error';
        } else if (isset($_SESSION['message']) && $_SESSION['message']['tipo'] === 'excluir') {
          $mensagem = $_SESSION['message']['mensagem'];
          unset($_SESSION['message']);
          $tipo = 'success';
        }

        // Exibe a mensagem, se houver
        if (isset($mensagem)) {
          echo "<div class=\"$tipo-message\">$mensagem</div>";
        }
        ?>

      </div>
      <thead>
        <tr>
          <th class='th-nome'>ID</th>
          <th class='th-nome'>Nome</th>
          <th class='th-cpf'>CPF</th>
          <th class='th-endereco'>Endereço</th>
          <th class='th-numero'>Número</th>
          <th class='th-cep'>CEP</th>
          <th class='th-telefone1'>Telefone 1</th>
          <th class='th-telefone2'>Telefone 2</th>
          <th class='th-data'>Data de Cadastro</th>
          <th class='th-acoes'>Ações</th>
        </tr>
      </thead>
      <tbody id="lista-clientes">
      </tbody>
      </tbody>
    </table>


  </section>

  <form id="form-excl-cliente" action="../methods/excl_cliente.php" method="POST">
    <input type="hidden" name="id_cliente" id="input-id-cliente">
  </form>

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

  <!-- Script para Formata tela de Cadastro -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/script_cliente.js"></script>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>