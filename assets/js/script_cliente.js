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

// Função para aplicar a máscara de telefone e de CPF
function fMasc(objeto, mascara) {
  obj = objeto;
  masc = mascara;
  setTimeout("fMascEx()", 1);
}

function fMascEx() {
  obj.value = masc(obj.value);
}

function mTel(tel) {
  tel = tel.replace(/\D/g, '');
  tel = tel.replace(/^(\d{2})/, '($1) ');
  tel = tel.replace(/(\d{4})$/, '-$1');
  return tel;
}

// Máscara de CPF
function mCPF(cpf) {
  cpf = cpf.replace(/\D/g, '');
  cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
  cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
  cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
  return cpf;
}

// Máscara de CEP
function mCEP(cep) {
  cep = cep.replace(/\D/g, '');
  cep = cep.replace(/^(\d{5})(\d)/, '$1-$2');
  return cep;
}

// Aplicando as máscaras nos campos
$(document).ready(function() {
  $(".phone-mask").mask("(00) 0000-0000#");
  $(".cep-mask").mask("00000-000#");
  $(".cpf-mask").mask("000.000.000-00#");
});


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

