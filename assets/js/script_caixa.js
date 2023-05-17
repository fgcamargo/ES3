const taxaInput = document.getElementById('taxa');

  taxaInput.addEventListener('focus', function() {
    taxaInput.value = '';
  });

  taxaInput.addEventListener('input', function(event) {
    // Remove todos os caracteres não numéricos
    const valorDigitado = event.target.value.replace(/\D/g, '');

    // Remove os zeros à esquerda depois do terceiro caractere
    const valorFormatado = valorDigitado.padStart(3, '0').replace(/^0+/, '');

    // Divide o valor formatado em duas partes
    const parteInteira = valorFormatado.slice(0, -2);
    const parteDecimal = valorFormatado.slice(-2);

    // Formata a parte inteira adicionando separador de milhar
    const parteInteiraFormatada = parteInteira.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

    // Atualiza o valor exibido no campo de taxa
    taxaInput.value = parteInteiraFormatada + ',' + parteDecimal;
  });



  function adicionarProduto(idProduto) {
    // Obter a referência para o campo de entrada de quantidade
    const quantidadeInput = document.getElementById('quantidade-' + idProduto);
  
    // Obter o valor da quantidade e do estoque, convertendo-os para números inteiros
    const quantidade = parseInt(quantidadeInput.value);
    const estoque = parseInt(event.target.dataset.qntestoque);
  
    // Verificar se a quantidade é um número válido e maior que zero
    if (isNaN(quantidade) || quantidade <= 0) {
      alert('Insira uma quantidade válida.');
      return;
    }
  
    // Verificar se a quantidade é maior que o estoque disponível
    if (quantidade > estoque) {
      alert('A quantidade inserida é maior que o estoque disponível.');
      return;
    }
  
    // Aqui você pode continuar com a lógica para adicionar o produto ao pedido
    // e realizar outras ações necessárias.
  
    // Limpar o campo de quantidade após adicionar o produto ao pedido
    quantidadeInput.value = '';
  }
  

// Função que armazena o dado do cliente e exibe na div
function selecionarCliente(button) {
  var clienteId = button.getAttribute('data-clienteid');
  var clienteNome = button.getAttribute('data-clientenome');
  var clienteCpf = button.getAttribute('data-clientecpf');
  var clienteEndereco = button.getAttribute('data-clienteendereco');
  var clienteNumero = button.getAttribute('data-clientenumero');
  var clienteCep = button.getAttribute('data-clientecep');
  var clienteTelefone = button.getAttribute('data-clientetelefone');



  // Armazenar os dados do cliente em um objeto (opcional)
  var clienteSelecionado = {
    id: clienteId,
    nome: clienteNome,
    cpf: clienteCpf,
    endereco: clienteEndereco,
    numero: clienteNumero,
    cep: clienteCep,
    telefone: clienteTelefone
  };

  // Exibir os dados do cliente na div clienteInfo
  document.getElementById('clienteNome').textContent = clienteNome;
  document.getElementById('clienteCPF').textContent = clienteCpf;
  document.getElementById('clienteEndereco').textContent = clienteEndereco;
  document.getElementById('clienteCEP').textContent = clienteCep;
  document.getElementById('clienteNumero').textContent = clienteNumero;
  document.getElementById('clienteTelefone').textContent = clienteTelefone;

  // Fazer algo com os dados do cliente selecionado
  console.log(clienteSelecionado);
}









function adicionarProduto(idProduto, quantidade, tipo, situacao, descricao, preco, nome) {
  var inputQuantidade = document.getElementById('quantidade-' + idProduto);
  var quantidadeSelecionada = inputQuantidade.value;

  if (quantidadeSelecionada > quantidade) {
    alert('Quantidade em estoque insuficiente.');
    return;
  }

  // Verifica se o produto já está na tabela
  var tabela = document.getElementById('tabelaProdutos');
  var linhas = tabela.getElementsByTagName('tr');
  for (var i = 1; i < linhas.length; i++) {
    var colunas = linhas[i].getElementsByTagName('td');
    var idColuna = colunas[0].textContent;
    var quantidadeColuna = colunas[2].textContent;

    // Se o produto já está na tabela, atualiza a quantidade
    if (idColuna == idProduto) {
      quantidadeSelecionada = parseInt(quantidadeSelecionada) + parseInt(quantidadeColuna);
      linhas[i].getElementsByTagName('td')[2].textContent = quantidadeSelecionada;
      linhas[i].getElementsByTagName('td')[4].textContent = quantidadeSelecionada * preco;
      inputQuantidade.value = '';
      return;
    }
  }

  // Cria uma nova linha na tabela
  var novaLinha = tabela.insertRow(-1);
  var colunaId = novaLinha.insertCell(0);
  var colunaItem = novaLinha.insertCell(1);
  var colunaQuantidade = novaLinha.insertCell(2);
  var colunaPrecoUnitario = novaLinha.insertCell(3);
  var colunaPrecoTotal = novaLinha.insertCell(4);
  var colunaAcao = novaLinha.insertCell(5);

  colunaId.textContent = idProduto;
  colunaItem.textContent = nome;
  colunaQuantidade.textContent = quantidadeSelecionada;
  colunaPrecoUnitario.textContent = preco;
  colunaPrecoTotal.textContent = quantidadeSelecionada * preco;

  // Botão de ação para remover o elemento
  var botaoRemover = document.createElement('button');
  botaoRemover.className = 'btn btn-danger btn-sm';
  botaoRemover.innerHTML = 'x';
  botaoRemover.onclick = function() {
    tabela.deleteRow(novaLinha.rowIndex);
    // Chamar a função para atualizar o estoque ao remover o produto
    atualizarEstoque(idProduto, quantidadeSelecionada);
  };

  colunaAcao.appendChild(botaoRemover);

  inputQuantidade.value = '';
}



// Cria pedido 
function criarPedido() {
  var formaPagamento = document.getElementById('forma-pagamento').value;
  var tipoEntrega = document.getElementById('tipo-entrega').value;
  var taxa = document.getElementById('taxa').value;
  var observacao = document.getElementById('observacao').value;

  // Verificar se existem itens na tabela de produtos
  var tabelaProdutos = document.getElementById('tabelaProdutos');
  if (tabelaProdutos.rows.length <= 1) {
    alert('Nenhum item foi adicionado ao pedido.');
    return;
  }

  // Obter os dados do cliente (exemplo: id_cliente)
  var idCliente = 1; // Exemplo: ID do cliente selecionado

  // Criar a lista de itens do pedido
  var itensPedido = [];
  
  // Adicionar os produtos da tabela de produtos à lista de itens do pedido
  for (var i = 1; i < tabelaProdutos.rows.length; i++) {
    var idProduto = tabelaProdutos.rows[i].cells[0].textContent;
    var quantidade = parseInt(tabelaProdutos.rows[i].cells[2].textContent);
    
    // Crie um objeto para representar um item do pedido
    var itemPedido = {
      id_produto: idProduto,
      quantidade: quantidade
    };
    
    // Adicione o item do pedido à lista de itens
    itensPedido.push(itemPedido);
  }

  // Calcular o valor total do pedido
  var valorTotal = 0;
  for (var i = 1; i < tabelaProdutos.rows.length; i++) {
    var quantidade = parseInt(tabelaProdutos.rows[i].cells[2].textContent);
    var precoUnitario = parseFloat(tabelaProdutos.rows[i].cells[3].textContent);
    valorTotal += quantidade * precoUnitario;
  }
  valorTotal += parseFloat(taxa);

  // Criar o objeto com os dados do pedido, incluindo a lista de itens do pedido
  var pedido = {
    id_cliente: idCliente,
    status: 'Recebido',
    valor_total: valorTotal,
    tipo_entrega: tipoEntrega,
    forma_pagamento: formaPagamento,
    observacao: observacao,
    data_hora: new Date().toISOString(),
    itensPedido: itensPedido
  };

  // Enviar os dados do pedido para o arquivo criar_pedido.php
  var xhr = new XMLHttpRequest();
  var url = '../methods/criar_pedido.php';
  xhr.open('POST', url, true);
  xhr.setRequestHeader('Content-type', 'application/json');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Pedido criado com sucesso
        alert('Pedido criado com sucesso!');
        // Limpar os campos e a tabela de produtos
        limparCampos();
        limparTabelaProdutos();
      } else {
        // Erro ao criar o pedido
        alert('Erro ao criar o pedido. Por favor, tente novamente.');
      }
    }
  };
  xhr.send(JSON.stringify(pedido));
}


function limparCampos() {
  document.getElementById('forma-pagamento').value = 'Selecionar Opção';
  document.getElementById('tipo-entrega').value = 'Selecionar Opção';
  document.getElementById('taxa').value = '10.00';
  document.getElementById('observacao').value = '';
}

function limparTabelaProdutos() {
  var tabelaProdutos = document.getElementById('tabelaProdutos');
  while (tabelaProdutos.rows.length > 1) {
    tabelaProdutos.deleteRow(1);
  }
}








