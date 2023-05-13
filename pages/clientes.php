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
          <a href="../methods/logout.php" class="nav-link">
            <ion-icon name="log-out-outline"></ion-icon>
            <span class="nav-link-text">Sair</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>

  <section class="cliente">
    <div class="col-md-12">

      <table class="table table-striped">

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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalcli">Cadastrar</button>
          </div>
        </div>


        <!-- Inicio do modal do cadastro -->
        <div class="modal fade" id="myModalcli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cadastrar Cliente</h4>
              </div>
              <div class="modal-body">
                <form id="edit-modal-form" method="POST" action="http://localhost/engenharia/methods/cad_cliente.php" enctype="multipart/form-data">
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="nomeCliente" class="col-form-label">Nome:</label>
                      <input type="text" class="form-control" name="nomeCliente" required>
                    </div>
                    <div class="col-sm-6">
                      <label for="cpfCliente" class="col-form-label">CPF:</label>
                      <input type="text" class="form-control =" maxlength="14" name="cpfCliente" onkeydown="javascript: fMasc( this, mCPF );" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="endCliente" class="col-form-label">Endereço:</label>
                    <input type="text" class="form-control" name="endeCliente" required>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="numCliente" class="col-form-label">Número:</label>
                      <input type="number" class="form-control" name="numCliente" required>
                    </div>
                    <div class="col-sm-6">
                      <label for="cepCliente" class="col-form-label">CEP:</label>
                      <input type="text" class="form-control cep" maxlength="9" name="cepCliente" onkeydown="javascript: fMasc( this, mCEP );" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="tel1Cliente" class="col-form-label">Telefone:</label>
                      <input type="tel" class="form-control" maxlength="15" name="tel1Cliente" onkeydown="javascript: fMasc( this, mTel );" required>
                    </div>
                    <div class="col-sm-6">
                      <label for="tel2Cliente" class="col-form-label">Celular:</label>
                      <input type="tel" class="form-control" maxlength="15" name="tel2Cliente" onkeydown="javascript: fMasc( this, mTel );">
                    </div>
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
            <th>CPF</th>
            <th>Endereço</th>
            <th>Numero</th>
            <th>CEP</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Cadastro</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../methods/list_cliente.php';
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
          <p>Tem certeza que deseja excluir o registro desse cliente?</p>

        </div>
        <div class="modal-footer">
          <form id="edit-modal-form" method="POST" action="http://localhost/engenharia/methods/excluir_cliente.php" enctype="multipart/form-data">
            <input name="id" type="hidden" class="form-control" id="idCliente">
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
          <h4 class="modal-title" id="id_produto">Atualização do Cliente</h4>
        </div>
        <div class="modal-body">
          <form id="edit-modal-form" method="POST" action="http://localhost/engenharia/methods/update_cliente.php" enctype="multipart/form-data">
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="nomeCliente" class="col-form-label">Nome:</label>
                <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" required>
                <input name="idCliente" type="hidden" class="form-control" id="idCliente">

              </div>
              <div class="col-sm-6">
                <label for="cpfCliente" class="col-form-label">CPF:</label>
                <input type="text" class="form-control =" maxlength="14" id="cpfCliente" name="cpfCliente" onkeydown="javascript: fMasc( this, mCPF );" required>
              </div>
            </div>
            <div class="form-group">
              <label for="endCliente" class="col-form-label">Endereço:</label>
              <input type="text" class="form-control" id="endeCliente" name="endeCliente" required>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="numCliente" class="col-form-label">Número:</label>
                <input type="number" class="form-control" id="numCliente" name="numCliente" required>
              </div>
              <div class="col-sm-6">
                <label for="cepCliente" class="col-form-label">CEP:</label>
                <input type="text" class="form-control cep" maxlength="9" id="cepCliente" name="cepCliente" onkeydown="javascript: fMasc( this, mCEP );" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="tel1Cliente" class="col-form-label">Telefone:</label>
                <input type="tel" class="form-control" maxlength="15" id="tel1Cliente" name="tel1Cliente" onkeydown="javascript: fMasc( this, mTel );" required>
              </div>
              <div class="col-sm-6">
                <label for="tel2Cliente" class="col-form-label">Celular:</label>
                <input type="tel" class="form-control" maxlength="15" id="tel2Cliente" name="tel2Cliente" onkeydown="javascript: fMasc( this, mTel );">
              </div>
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

      modal.find('#idCliente').val(recipientid);

    })
    $('#exampleModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget)
      var recipientid = button.data('whateverid')
      var recipientnome = button.data('whatevernome')
      var recipientcpf = button.data('whatevercpf')
      var recipientende = button.data('whateverende')
      var recipientnum = button.data('whatevernum')
      var recipientcep = button.data('whatevercep')
      var recipienttel1 = button.data('whatevertel1')
      var recipienttel2 = button.data('whatevertel2')
      var recipientcadastro = button.data('whatevercadastro')


      var modal = $(this)

      modal.find('#idCliente').val(recipientid);
      modal.find('#id_Cliente').text('Atualização do Cliente: ' + recipientid);
      modal.find('#idCliente').val(recipientid)
      modal.find('#nomeCliente').val(recipientnome)
      modal.find('#cpfCliente').val(recipientcpf)
      modal.find('#endeCliente').val(recipientende)
      modal.find('#numCliente').val(recipientnum)
      modal.find('#cepCliente').val(recipientcep)
      modal.find('#tel1Cliente').val(recipienttel1)
      modal.find('#tel2Cliente').val(recipienttel2)
      modal.find('#cadastroClietne').val(recipientcadastro)
    })
  </script>

  <!-- Script para Formata tela de Cadastro -->

  <script src="../assets/js/script_cliente.js"></script>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>