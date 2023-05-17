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

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Bootstrap-->
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

  <!-- Estilos Criado -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/header.css">
  <link rel="stylesheet" href="../assets/css/navbar.css">
  <link rel="stylesheet" href="../assets/css/pedidos.css">
  <link rel="stylesheet" href="../assets/css/footer.css">

  <title>Profit - Produtos</title>

</head>

<body class="meu-body">

  <header class="meu-cabecalho">
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

        <li class="nav-item">
          <a href="../pages/logout.php" class="nav-link">
            <ion-icon name="log-out-outline"></ion-icon>
            <span class="nav-link-text">Sair</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>

  <section class="pedidos">
    <div class="col-md-12">
      <h1>Painel de Pedidos</h1>
      <!-- Botão de cadastro -->
      <div class="row">
        <div class="col-md-4">
          <div class="table-responsive">
            <table class="table table-striped table-recebido">
              <h2>Pedidos Recebidos</h2>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>Valor Total</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require_once '../methods/list_pedidos.php';
                listarPedidos('Recebido')
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-4">
          <div class="table-responsive">
            <table class="table table-striped table-preparo">
              <h2>Pedidos em Preparo</h2>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>Valor Total</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require_once '../methods/list_pedidos.php';
                listarPedidos('Preparo')
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-4">
          <div class="table-responsive">
            <table class="table table-striped table-pronto">
              <h2>Pedidos Prontos</h2>
              <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Valor Total</th>
                <th>Tipo de Entrega</th>
                <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require_once '../methods/list_pedidos.php';
                listarPedidos('Pronto')
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </section>

  <section class="pedidos">
    <div class="row">
      <div class="col-md-6">
        <table class="table table-striped table-finalizado">
          <h2>Pedidos Finalizados</h2>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>Valor Total</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once '../methods/list_pedidos.php';
            listarPedidos('Finalizado')
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <table class="table table-striped table-cancelado">
          <h2>Pedidos Cancelados</h2>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>Valor Total</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once '../methods/list_pedidos.php';
            listarPedidos('Cancelado')
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>


  <!-- Modal de Pedidos -->
  <div class="modal fade" id="pedidosModal" tabindex="-1" aria-labelledby="pedidosModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pedidosModalLabel">Detalhes do Pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="pedidoNumero">Número do Pedido:</label>
              <input type="text" class="form-control" id="idPedido" readonly>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="clienteNome">Nome:</label>
                <input type="text" class="form-control" id="nomeCliente" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="clienteCPF">CPF:</label>
                <input type="text" class="form-control" id="cpfCliente" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-8">
                <label for="clienteEndereco">Endereço:</label>
                <input type="text" class="form-control" id="endeCliente" readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="clienteNum">CEP:</label>
                <input type="text" class="form-control" id="cepCliente" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="clienteNum">Num:</label>
                <input type="text" class="form-control" id="numCliente" readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="valorTotal">Valor Total:</label>
                <input type="text" class="form-control" id="totalPedido" readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="formaPagamento">Pagamento:</label>
                <input type="text" class="form-control" id="pagamentoPedido" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="observacoes">Observações:</label>
              <textarea class="form-control" id="observacoes" readonly></textarea>
            </div>
            <div class="form-row">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#itensModal">Exibir Lista</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal de Itens -->
  <div class="modal fade" id="itensModal" tabindex="-1" aria-labelledby="itensModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="itensModalLabel">Itens do Pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Conteúdo da lista de itens -->
          <table class="table">
            <thead>
              <tr>
                <th>ID Item</th>
                <th>ID Pedido</th>
                <th>ID Produto</th>
                <th>Quantidade</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once '../methods/list_itens_pedido.php';

              ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de Alteração de Status -->
  <div class="modal fade" id="alteraStatusModal" tabindex="-1" aria-labelledby="alteraStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="alteraStatusModalLabel">Alterar Status do Pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="modal-body">
            <p id="alteraStatusMensagem">Deseja alterar o pedido <span id="pedidoID"></span> para o status <span id="novoStatus"></span>?</p>
          </div>
          <form id="alteraStatusForm" action="../methods/update_status_pedido.php" method="POST">
            <div class="form-group">
              <input type="hidden" name="pedidoId" id="pedidoId">
              <input type="hidden" name="novostatus" id="novostatus">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Sim</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>







  <!-- Estrutura Rodapé -->
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

  <!-- JavaScript do Bootstrap -->
  <script type="text/javascript">
    $('#alteraStatusModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var recipientId = button.data('whateverid');
      var recipientstatus = button.data('whateverstatus');

      var modal = $(this);

      modal.find('#pedidoID').text(recipientId);
      modal.find('#novoStatus').text(recipientstatus);
      modal.find('#pedidoId').val(recipientId);
      modal.find('#novostatus').val(recipientstatus);
    });

    $('#pedidosModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var recipientid = button.data('whateverid');
      var recipientnome = button.data('whatevernome');
      var recipientcpf = button.data('whatevercpf');
      var recipientende = button.data('whateverende');
      var recipientcep = button.data('whatevercep');
      var recipientnum = button.data('whatevernum');
      var recipienttotal = button.data('whatevertotal');
      var recipientpagamento = button.data('whatevercpagamento');
      var recipientobs = button.data('whatevercobs');

      var modal = $(this);

      modal.find('#idPedido').val(recipientid);
      modal.find('#nomeCliente').val(recipientnome);
      modal.find('#cpfCliente').val(recipientcpf);
      modal.find('#endeCliente').val(recipientende);
      modal.find('#cepCliente').val(recipientcep);
      modal.find('#numCliente').val(recipientnum);
      modal.find('#totalPedido').val(recipienttotal);
      modal.find('#pagamentoPedido').val(recipientpagamento);
      modal.find('#observacoes').val(recipientobs);
    });
  </script>



  <!-- Scripts criado -->
  <script src="../assets/js/script_produto.js"></script>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>