

  // Máscara de telefone
  $(".phone-mask").blur(function() {
    var phone = $(this).val().replace(/\D/g, '');
    $(this).val(phone.replace(/(\d{2})(\d{4,5})(\d{4})/, '($1) $2-$3'));
  });

// Máscara de telefone
$(".phone-mask").blur(function() {
  var phone = $(this).val().replace(/\D/g, '');
  $(this).val(phone.replace(/(\d{2})(\d{4,5})(\d{4})/, '($1) $2-$3'));
});

// Máscara de CEP
$(".cep-mask").blur(function() {
  var cep = $(this).val().replace(/\D/g, '');
  $(this).val(cep.replace(/(\d{5})(\d{3})/, '$1-$2'));
});

// Máscara de CPF
$(".cpf-mask").blur(function() {
  var cpf = $(this).val().replace(/\D/g, '');
  $(this).val(cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4'));
});


// Função que faz o filtro da pesquina na tabela

$(document).ready(function() {
  $('#search-input').on('keyup', function() {
    var searchValue = $(this).val().toLowerCase().trim();
    $('table tbody tr').each(function() {
      var cells = $(this).find('td');
      var found = false;
      cells.each(function() {
        var cellText = $(this).text().toLowerCase().trim();
        if (cellText.indexOf(searchValue) !== -1) {
          found = true;
          return false;
        }
      });
      if (found) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });
});



// Script que gera a tabela no html
$(document).ready(function() {
  // Faz uma requisição AJAX para o servidor para obter a lista de clientes
  $.ajax({
    url: "../methods/list_cliente.php",
    dataType: "json",
    success: function(data) {
      // Loop pelos dados e cria uma nova linha para cada registro
      $.each(data, function(index, cliente) {
        var newRow = $("<tr>").addClass("row-cliente");
        newRow.append($("<td>").text(cliente.id_cliente));
        newRow.append($("<td>").text(cliente.nome));
        newRow.append($("<td>").text(cliente.cpf));
        newRow.append($("<td>").text(cliente.ende));
        newRow.append($("<td>").text(cliente.num));
        newRow.append($("<td>").text(cliente.cep));
        newRow.append($("<td>").text(cliente.tel1));
        newRow.append($("<td>").text(cliente.tel2));
        newRow.append($("<td>").text(cliente.data_cadastro));
        newRow.append($("<td>").html("<button class='bt-edit' data-id='" + cliente.id_cliente + "' onclick='editUsuario(" + cliente.id_cliente + ")'><ion-icon name='pencil-outline'></ion-icon></button>" + "<button class='bt-excl' data-id='" + cliente.id_cliente + "' onclick='excluirUsuario(" + cliente.id_cliente + ")'><ion-icon name='trash-outline'></ion-icon></button>"));
        $("#lista-clientes").append(newRow);
      });
    }
  });
});


async function excluirUsuario(id_cliente){
  console.log("Acessou a função: " + id_cliente);

  const dados = await fetch('../methods/excl_cliente.php?id='+ id_cliente);

  location.href = '../pages/clientes.php'; // redireciona o navegador para a página cliente.php

  // Aguarda um pequeno atraso e atualiza a página
  setTimeout(function() {
    location.reload();
  }, 1);
}
