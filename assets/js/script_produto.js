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

