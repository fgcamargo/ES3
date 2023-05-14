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
  <link rel="stylesheet" href="../assets/css/produto.css">
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




  <!-- Sessão que exibe a lista de produtos -->
  <section class="produtos">
    <div class="col-md-12">
      <table class="table table-striped">
        <h1>Painel de Produtos</h1>
        <!-- Botão de cadastro -->
        <div class="row">
          <div class="col-md-6">
            <!-- Barra de pesquisa -->
            <div class="input-group">
              <input type="text" oninput="filtrarTabela()" class="form-control" placeholder="Pesquisar...">
            </div>
          </div>
          <div class="col-md-6 text-right">
            <!-- Botão de cadastro -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalcad">Cadastrar</button>
          </div>
        </div>


        <!-- Inicio do modal do cadastro -->
        <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cadastrar Produto</h4>
              </div>
              <div class="modal-body">
                <form id="edit-modal-form" method="POST" action="http://localhost/engenharia/methods/cad_produto.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="nomeProduto">Nome:</label>
                    <input name="nome" type="text" class="form-control" placeholder="Digite o nome do produto" required>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6">
                        <label for="precoProduto">Preço:</label>
                        <div class="input-group">
                          <div class="input-group-addon">R$</div>
                          <input name="preco" type="text" class="form-control" placeholder="0,00" onkeyup="formatarPreco(this);" required>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label for="tipoProduto">Tipo:</label>
                        <select name="tipo" class="form-control" required>
                          <option value="salgados">Salgados</option>
                          <option value="lanches">Lanches</option>
                          <option value="bebidas">Bebidas</option>
                          <option value="sobremesas">Sobremesas</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="quantidadeProduto">Quantidade em Estoque:</label>
                    <input name="estoque" type="number" class="form-control" placeholder="Digite a quantidade em estoque" required>
                  </div>
                  <div class="form-group">
                    <label for="descricaoProduto">Descrição:</label>
                    <textarea name="descricao" class="form-control" placeholder="Digite a descrição do produto"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Fim do modal -->

        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Tipo</th>
            <th>Descrição</th>
            <th>Estoque</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../methods/list_produto.php';
          ?>
        </tbody>
      </table>
  </section>

  <!-- Modal de validação de exclusão -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="deleteModalLabel">Confirmação de Exclusão</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <p>Tem certeza que deseja excluir este produto?</p>

        </div>
        <div class="modal-footer">
          <form id="edit-modal-form" method="POST" action="http://localhost/engenharia/methods/excluir_produto.php" enctype="multipart/form-data">
            <input name="id" type="hidden" class="form-control" id="idProduto">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger" id="deleteButton">Excluir</button>
          </form>

        </div>
      </div>
    </div>
  </div>
  <!-- Fim do modal -->


  <!-- Modal de edição -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="editmodal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="id_produto">Atualização de Produto</h4>
        </div>
        <div class="modal-body">
          <form id="edit-modal-form" method="POST" action="http://localhost/engenharia/methods/update_produto.php" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nomeProduto">Nome:</label>
              <input name="nome" type="text" class="form-control" id="nomeProduto" placeholder="Digite o nome do produto" required>
              <input name="id" type="hidden" class="form-control" id="idProduto">
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-6">
                  <label for="precoProduto">Preço:</label>
                  <div class="input-group">
                    <div class="input-group-addon">R$</div>
                    <input name="preco" type="text" class="form-control" id="precoProduto" placeholder="0,00" onkeyup="formatarPreco(this);" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <label for="tipoProduto">Tipo:</label>
                  <select name="tipo" class="form-control" id="tipoProduto" required>
                    <option value="salgados">Salgados</option>
                    <option value="lanches">Lanches</option>
                    <option value="bebidas">Bebidas</option>
                    <option value="sobremesas">Sobremesas</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="quantidadeProduto">Quantidade em Estoque:</label>
              <input name="estoque" type="number" class="form-control" id="quantidadeProduto" placeholder="Digite a quantidade em estoque" required>
            </div>
            <div class="form-group">
              <label for="descricaoProduto">Descrição:</label>
              <textarea name="descricao" class="form-control" id="descricaoProduto" placeholder="Digite a descrição do produto"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Fim do modal de edição -->















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


  <!--Java script bootstrap -->
  <script type="text/javascript">
    $('#deleteModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget)
      var recipientid = button.data('whateverid')

      var modal = $(this)

      modal.find('#idProduto').val(recipientid);

    })
    $('#exampleModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget)
      var recipientid = button.data('whateverid')
      var recipientnome = button.data('whatevernome')
      var recipientpreco = button.data('whateverpreco')
      var recipienttipo = button.data('whatevertipo')
      var recipientqntesq = button.data('whateverqntesq')
      var recipientdescrip = button.data('whateverdescrip')


      var modal = $(this)

      modal.find('#idProduto').val(recipientid);
      modal.find('#id_produto').text('Atualização do Produto: ' + recipientid);
      modal.find('#idProduto').val(recipientid)
      modal.find('#nomeProduto').val(recipientnome)
      modal.find('#precoProduto').val(recipientpreco)
      modal.find('#tipoProduto').val(recipienttipo)
      modal.find('#quantidadeProduto').val(recipientqntesq)
      modal.find('#descricaoProduto').val(recipientdescrip)
    })
  </script>




  <!-- Scripts criado -->
  <script src="../assets/js/script_produto.js"></script>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>