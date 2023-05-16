// Ativa e desativa opção de taxa de entrega conforme escolha
const tipoEntregaSelect = document.getElementById('tipo-entrega');
const taxaEntregaInput = document.getElementById('taxa-entrega');

tipoEntregaSelect.addEventListener('change', function() {
  if (tipoEntregaSelect.value === 'entrega') {
    taxaEntregaInput.disabled = false;
  } else {
    taxaEntregaInput.disabled = true;
  }
});

