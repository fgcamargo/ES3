<?php
require_once '../methods/session.php';
require_once '../methods/conn.php';

validaSessao();

// Verifica se foi passado algum valor na pesquisa
if(isset($_POST['valor_pesquisa'])){
  // Remove espaços em branco no começo e final da string de pesquisa
  $valor_pesquisa = trim($_POST['valor_pesquisa']);
  
  // Prepara a consulta com o valor de pesquisa
  $stmt = $conn->prepare("SELECT id_produto, nome, preco, tipo, descricao, qnt_estoque FROM produto WHERE nome LIKE ?");
  
  // Adiciona o caractere % no início e fim do valor de pesquisa, para que a consulta encontre resultados parciais
  $valor_pesquisa = "%" . $valor_pesquisa . "%";
  
  // Atribui o valor de pesquisa para a consulta
  $stmt->bind_param("s", $valor_pesquisa);
  $stmt->execute();
  
  // Obtém os resultados
  $resultado = $stmt->get_result();
  
  // Verifica se foram encontrados resultados
  if ($resultado->num_rows == 0) {
    $produtos = array();
  } else {
    $produtos = $resultado->fetch_all(MYSQLI_ASSOC);
  }
  
  // Retorna o resultado em JSON
  echo json_encode($produtos);
}

$stmt->close();
$conn->close();
