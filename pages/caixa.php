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
          <a href="../methods/logout.php" class="nav-link">
            <ion-icon name="log-out-outline"></ion-icon>
            <span class="nav-link-text">Sair</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>



  <section>
    <h1>Caixa</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <!-- Lado A -->
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#cliente">Cliente</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade" id="cliente">
              <!-- Tabela para a categoria "Cliente" -->
              <h2>Cliente</h2>
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once '../methods/busca_cliente.php';
                  ?>
                  <!-- Adicionar mais linhas conforme necessário -->
                </tbody>
              </table>
            </div>
          </div>
          <ul class=" nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#salgados">Salgados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#lanches">Lanches</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#bebidas">Bebidas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#sobremesas">Sobremesas</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade" id="salgados">
              <!-- Tabela de salgados -->
              <h2>Salgados</h2>
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Estoque</th>
                    <th>Preço Uni.</th>
                    <th>Quantidade</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once '../methods/busca_produto.php';
                  listarProdutos('Salgados')
                  ?>

                  <!-- Adicionar mais linhas conforme necessário -->
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="lanches">
              <!-- Tabela de lanches -->
              <h2>Lanches</h2>
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Estoque</th>
                    <th>Preço Uni.</th>
                    <th>Quantidade</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once '../methods/busca_produto.php';
                  listarProdutos('Lanches')
                  ?>
                  <!-- Adicionar mais linhas conforme necessário -->
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="bebidas">
              <!-- Tabela de bebidas -->
              <h2>Bebidas</h2>
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Estoque</th>
                    <th>Preço Uni.</th>
                    <th>Quantidade</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once '../methods/busca_produto.php';
                  listarProdutos('Bebidas')
                  ?>
                  <!-- Adicionar mais linhas conforme necessário -->
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="sobremesas">
              <!-- Tabela de sobremesas -->
              <h2>Sobremesas</h2>
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Estoque</th>
                    <th>Preço Uni.</th>
                    <th>Quantidade</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once '../methods/busca_produto.php';
                  listarProdutos('Sobremesas')
                  ?>
                  <!-- Adicionar mais linhas conforme necessário -->
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="forma-pagamento">Forma de Pagamento:</label>
                <select class="form-control" id="forma-pagamento">
                  <option value="pix">Selecionar Opção</option>
                  <option value="pix">Pix</option>
                  <option value="dinheiro">Dinheiro</option>
                  <option value="credito">Crédito</option>
                  <option value="debito">Débito</option>
                  <option value="vale-refeicao">Vale Refeição</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tipo-entrega">Tipo de Entrega:</label>
                <select class="form-control" id="tipo-entrega">
                  <option value="pix">Selecionar Opção</option>
                  <option value="pix">Retirada</option>
                  <option value="dinheiro">Entrega</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="taxa">Taxa:</label>
                <div class="input-group">
                  <span class="input-group-addon">R$</span>
                  <input type="text" class="form-control" id="taxa" value="10.00">
                </div>
              </div>

            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="observacao">Observação:</label>
                <textarea class="form-control" id="observacao" rows="3"></textarea>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-6">
              <button class="btn btn-danger btn-block" onclick="limparCampos(); limparTabelaProdutos()">Cancelar</button>
            </div>
            <div class="col-md-6">
              <button class="btn btn-success btn-block" onclick="criarPedido()">Criar Pedido</button>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <!-- Lado B -->
          <h2>Pedido Realizado por: </h2>
          <div id="clienteInfo">
            <div class="row">
              <div class="col-md-6">
                <p>Nome: <span id="clienteNome"></span></p>
                <p>CPF: <span id="clienteCPF"></span></p>
              </div>
              <div class="col-md-6">
                <p>Endereço: <span id="clienteEndereco"></span></p>
                <p>CEP: <span id="clienteCEP"></span></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <p>Tel1: <span id="clienteTelefone"></span></p>
              </div>
              <div class="col-md-6">
                <p>Num: <span id="clienteNumero"></span></p>
              </div>
            </div>
          </div>


          <h2>Comanda</h2>
          <div class="table-responsive">
            <table class="table" id="tabelaProdutos">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Item</th>
                  <th>Quantidade</th>
                  <th>Preço Unitário</th>
                  <th>Preço Total</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>








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


  <!-- Script para Formata tela de Cadastro -->
  <script src="../assets/js/script_caixa.js"></script>

  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>