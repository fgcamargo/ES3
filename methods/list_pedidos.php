<?php
require_once '../methods/session.php';
require_once '../methods/conn.php';

function listarPedidos($status)
{
  global $conn;

  validaSessao();

  $stmt = $conn->prepare("SELECT pedidos.id_pedido, clientes.nome, clientes.cpf, pedidos.valor_total, pedidos.tipo_entrega  
                        FROM pedidos 
                        JOIN clientes ON clientes.id_cliente = pedidos.id_cliente
                        WHERE pedidos.status = ?");
  $stmt->bind_param("s", $status);

  $stmt->execute();
  $resultado = $stmt->get_result();


  if ($resultado->num_rows == 0) {
    echo "<tr><td colspan='5'>Nenhum Produto encontrado</td></tr>";
  } else {
    while ($row = $resultado->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['id_pedido'] . "</td>";
      echo "<td>" . $row['nome'] . "</td>";
      echo "<td>" . $row['cpf'] . "</td>";
      echo "<td>" . $row['valor_total'] . "</td>";
      if ($status == 'Em preparo') {
        echo "<td>" . $row['tipo_entrega'] . "</td>";
      }

      if ($status == 'Aceito') {
        echo "<td><button class='btn btn-info preparar-pedido' data-id='" . $row['id_pedido'] . "'>Visualizar</button>
            <button class='btn btn-warning cancelar-pedido' data-id='" . $row['id_pedido'] . "'>Preparo</button>
            <button class='btn btn-danger cancelar-pedido' data-id='" . $row['id_pedido'] . "'>Cancelar</button></td>";
      } else if ($status == 'Em preparo') {
        echo "<td><button class='btn btn-warning finalizar-pedido' data-id='" . $row['id_pedido'] . "'>Retirada</button>
            <button class='btn btn-primary cancelar-pedido' data-id='" . $row['id_pedido'] . "'>Entrega</button></td>";
      } else if ($status == 'Retirada') {
        echo "<td><button class='btn btn-success preparar-pedido' data-id='" . $row['id_pedido'] . "'>Finalizar</button></td>";
      } else if ($status == 'Saiu para entrega') {
        echo "<td><button class='btn btn-success preparar-pedido' data-id='" . $row['id_pedido'] . "'>Finalizar</button></td>";
      } else if ($status == 'Finalizado') {
        echo "<td><button class='btn btn-info preparar-pedido' data-id='" . $row['id_pedido'] . "'>Visualizar</button></td>";
      } else if ($status == 'Cancelado') {
        echo "<td><button class='btn btn-info preparar-pedido' data-id='" . $row['id_pedido'] . "'>Visualizar</button></td>";
      } else {
        echo "<td>Nenhum botão disponível</td>";
      }
    }

    mysqli_data_seek($resultado, 0);

    $produtos = array();
    while ($dados = $resultado->fetch_assoc()) {
      $produtos[] = $dados;
    }
  }
}
