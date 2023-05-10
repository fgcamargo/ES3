  // Função para formatar o preço
  function formatarPreco(elemento) {
    var preco = elemento.value.replace(/\D/g, '');
    var tamanhoPreco = preco.length;
  
    if (tamanhoPreco > 2) {
      preco = preco.substr(0, tamanhoPreco - 2) + "," + preco.substr(tamanhoPreco - 2);
    } else {
      preco = "0," + preco.padStart(2, '0');
    }
  
    if (tamanhoPreco > 5) {
      preco = preco.substr(0, tamanhoPreco - 5) + "." + preco.substr(tamanhoPreco - 5);
    }
  
    if (tamanhoPreco > 8) {
      preco = preco.substr(0, tamanhoPreco - 8) + "." + preco.substr(tamanhoPreco - 8);
    }
  
    // remove os zeros à esquerda
    preco = preco.replace(/^0+/, '');
  
    elemento.value = preco;
  }


  function filtrarTabela() {
    var input, filtro, tabela, linhas, celulas, i, j, valorCelula;
    input = document.querySelector('.form-control');
    filtro = input.value.toUpperCase();
    tabela = document.querySelector('table');
    linhas = tabela.getElementsByTagName('tr');
  
    for (i = 0; i < linhas.length; i++) {
      celulas = linhas[i].getElementsByTagName('td');
      for (j = 0; j < celulas.length; j++) {
        valorCelula = celulas[j].textContent || celulas[j].innerText;
        if (valorCelula.toUpperCase().indexOf(filtro) > -1) {
          linhas[i].style.display = '';
          break;
        } else {
          linhas[i].style.display = 'none';
        }
      }
    }
  }
  
  