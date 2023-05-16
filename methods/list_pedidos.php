<?php
require_once '../methods/session.php';
require_once '../methods/conn.php';

function listarPedidos($status)
{
  global $conn;

  validaSessao();



  $stmt = $conn->prepare("SELECT pedidos.id_pedido, clientes.nome, clientes.cpf, clientes.ende, clientes.num, clientes.cep, pedidos.tipo_entrega, pedidos.valor_total, pedidos.valor_total, pedidos.forma_pagamento, pedidos.observacao  
                        FROM pedidos 
                        JOIN clientes ON clientes.id_cliente = pedidos.id_cliente
                        WHERE pedidos.status = ?");
  $stmt->bind_param("s", $status);
  $stmt->execute();
  $resultado = $stmt->get_result();


  if ($resultado->num_rows == 0) {
    echo "<tr><td colspan='5'>Nenhum Pedido encontrado</td></tr>";
  } else {
    while ($row = $resultado->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['id_pedido'] . "</td>";
      echo "<td>" . $row['nome'] . "</td>";
      echo "<td>" . $row['cpf'] . "</td>";
      echo "<td>" . $row['valor_total'] . "</td>";

      if ($status == 'Pronto') {
        echo "<td>" . $row['tipo_entrega'] . "</td>";
      }

      if ($status == 'Recebido') {
        echo "<td>
        <button class='btn btn-info' data-toggle='modal' data-target='#pedidosModal' data-whateverid='" . $row['id_pedido'] . "' data-whatevernome='" . $row['nome'] . "' data-whatevercpf='" . $row['cpf'] . "' data-whateverende='" . $row['ende'] . "' data-whatevercep='" . $row['cep'] . "' data-whatevernum='" . $row['num'] . "' data-whateverentrega='" . $row['tipo_entrega'] . "' data-whatevertotal='" . $row['valor_total'] . "' data-whatevercpagamento='" . $row['forma_pagamento'] . "' data-whatevercobs='" . $row['observacao'] . "'>Visualizar</button>
        <button class='btn btn-warning' data-toggle='modal' data-target='#alteraStatusModal' data-whateverid='" . $row['id_pedido'] . "' data-whateverstatus='Preparo'>Preparo</button>
        <button class='btn btn-danger' data-toggle='modal' data-target='#alteraStatusModal' data-whateverid='" . $row['id_pedido'] . "' data-whateverstatus='Cancelado'>Cancelar</button>
              </td>";
      } else if ($status == 'Preparo') {
        echo "<td>
        <button class='btn btn-primary' data-toggle='modal' data-target='#alteraStatusModal' data-whateverid='" . $row['id_pedido'] . "' data-whateverstatus='Pronto'>Pronto</button>
        </td>";
      } else if ($status == 'Pronto') {
        echo "<td>
        <button class='btn btn-success' data-toggle='modal' data-target='#alteraStatusModal' data-whateverid='" . $row['id_pedido'] . "' data-whateverstatus='Finalizado'>Finalizar</button>
        
              </td>";
      } else if ($status == 'Finalizado' || $status == 'Cancelado') {
        echo "<td>
        <button class='btn btn-info' data-toggle='modal' data-target='#pedidosModal' data-whateverid='" . $row['id_pedido'] . "' data-whatevernome='" . $row['nome'] . "' data-whatevercpf='" . $row['cpf'] . "' data-whateverende='" . $row['ende'] . "' data-whatevercep='" . $row['cep'] . "' data-whatevernum='" . $row['num'] . "' data-whateverentrega='" . $row['tipo_entrega'] . "' data-whatevertotal='" . $row['valor_total'] . "' data-whatevercpagamento='" . $row['forma_pagamento'] . "' data-whatevercobs='" . $row['observacao'] . "'>Visualizar</button>
        </td>";
      } else {
        echo "<td>Nenhum botão disponível</td>";
      }

      echo "</tr>";
    }
  }


  mysqli_data_seek($resultado, 0);

  $produtos = array();
  while ($dados = $resultado->fetch_assoc()) {
    $produtos[] = $dados;
  }
}
