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
  <link rel="stylesheet" href="../assets/css/caixa.css">
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


  <section>
    <h1>Caixa</h1>
    <div class="row">
      <div class="col-md-6">
        <h2>Realização de Pedidos</h2>
        <form action="../methods/busca_cliente.php" method="GET">
          <div class="form-group">
            <label for="busca">Buscar Cliente:</label>
            <input type="text" class="form-control" id="busca" name="busca" placeholder="Digite o CPF ou nome do cliente">
          </div>
          <button type="submit" class="btn btn-primary">Buscar</button>
        </form>


        <div class="btn-group">
          <button type="button" class="btn btn-primary" value="clientes">Clientes</button>
          <button type="button" class="btn btn-primary" value="salgados">Salgados</button>
          <button type="button" class="btn btn-primary" value="lanches">Lanches</button>
          <button type="button" class="btn btn-primary" value="bebidas">Bebidas</button>
          <button type="button" class="btn btn-primary" value="sobremesas">Sobremesas</button>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th>Item</th>
              <th>Quantidade</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../methods/teste.php';
            $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
            exibirProdutos($tipo);
            ?>

          </tbody>
        </table>

        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="forma-pagamento">Forma de Pagamento</label>
              <select class="form-control" id="forma-pagamento">
                <option>Selecione uma forma de Pagamento</option>
                <option>Pix</option>
                <option>Dinheiro</option>
                <option>Cartão de Crédito</option>
                <option>Cartão de Débito</option>
                <option>Vale-Refeição</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="tipo-entrega">Tipo de Entrega</label>
                  <select class="form-control" id="tipo-entrega">
                    <option value="retirada">Retirada</option>
                    <option value="entrega">Entrega</option>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="taxa-entrega">Taxa de Entrega</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="taxa-entrega" value="R$ 10.00" disabled>
                    <div class="input-group-append">
                      <span class="input-group-text"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <h2>Comanda</h2>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Quantidade</th>
              <th>Valor</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../methods/list_itens_pedidos.php';
            ?>
          </tbody>
        </table>
        <div class="total-section">
          <h3>Total: <span id="valor-total">R$ 0.00</span></h3>
        </div>
        <div class="button-section">
          <button class="btn btn-secondary">Cancelar</button>
          <button class="btn btn-success">Finalizar Pedido</button>
        </div>
      </div>
    </div>
  </section>


  <!-- Código HTML do modal -->
  <div id="resultadoModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Resultados da Busca</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Endereço</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Código PHP para exibir os resultados
              include '../methods/busca_cliente.php';
              exibirClientes($termo);
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>






  <footer>
    <div class=" footer-container">
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

  <!-- JavaScript do Bootstrap -->
  <script type="text/javascript">
    $('#deleteModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var recipientId = button.data('whateverid');

      var modal = $(this);

      modal.find('#idCliente').val(recipientId);
    });

    $('#exampleModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var recipientId = button.data('whateverid');
      var recipientNome = button.data('whatevernome');
      var recipientCpf = button.data('whatevercpf');
      var recipientEndereco = button.data('whateverende');
      var recipientNumero = button.data('whatevernum');
      var recipientCep = button.data('whatevercep');
      var recipientTel1 = button.data('whatevertel1');
      var recipientTel2 = button.data('whatevertel2');
      var recipientCadastro = button.data('whatevercadastro');

      var modal = $(this);

      modal.find('#idCliente').val(recipientId);
      modal.find('#id_Cliente').text('Atualização do Cliente: ' + recipientId);
      modal.find('#idCliente').val(recipientId);
      modal.find('#nomeCliente').val(recipientNome);
      modal.find('#cpfCliente').val(recipientCpf);
      modal.find('#endeCliente').val(recipientEndereco);
      modal.find('#numCliente').val(recipientNumero);
      modal.find('#cepCliente').val(recipientCep);
      modal.find('#tel1Cliente').val(recipientTel1);
      modal.find('#tel2Cliente').val(recipientTel2);
      modal.find('#cadastroCliente').val(recipientCadastro);
    });
  </script>



  <!-- Script para Formata tela de Cadastro -->

  <script src="../assets/js/script_caixa.js"></script>

  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>