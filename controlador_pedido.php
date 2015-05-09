<?php
include ("modelo_pedido.php");

if(isset($_POST['acao'])){
	$acao=$_POST['acao'];	
} else {
	$acao=$_GET['acao'];
}



switch ($acao){
	case "gerar_pedido":
		$array_pedido['codigo'] = $_POST['codigo'];
		$array_pedido['descricao'] = $_POST['descricao'];
		$array_pedido['preco_venda'] = $_POST['preco_venda'];
		$array_pedido['estoque_atual']=$_POST['estoque_atual'];
		$array_pedido['qtd'] = $_POST['qtd'];
		$array_pedido['valor_total'] = $array_pedido['preco_venda'] * $array_pedido['qtd'];
		if (salvarPedido($array_pedido)) {
			echo "<script> alert('Pedido gerado com sucesso.')</script>"; 			 
			 echo "<script>location.href='controlador_produto.php?acao=listarProdutos'</script>";
		} else {
			echo "<script>alert('Erro ao gerar pedido')</script>";
		}
		break;
	
	case "listar_pedido":
		$array_lista=listarPedido();
		require_once ("cabecalho.php");
		if (!empty($array_lista)) {
			$totais = totalPedido();
			echo "<h1>Listagem de Pedidos</h1>";
			echo "<div class='alert alert-success'role='alert'>Já foram vendidos ". $totais[0]["totais"]." em pedidos.</div>";
			echo "<table class='table table-striped table-bordered'>".
					"<tr>".
					"<td>Pedido</td>".
					"<td>Produto</td>".
					"<td>Descrição</td>".
					"<td>Quantidade</td>".
					"<td>Preço Unitário</td>".
					"<td>Preço Total</td>".
					"</tr>";
				
				foreach ($array_lista as $pedidos) {
					echo 	"<tr>".
							"<td>".$pedidos['codpedvend']."</td>".
							"<td>".$pedidos['codproduto']."</td>".
							"<td>".$pedidos['descricao']."</td>".
							"<td>".$pedidos['qtd']."</td>".
							"<td>".$pedidos['valorprod']."</td>".
							"<td>".$pedidos['valortotal']."</td>".
							"</tr>";
			}
				 "</table>";
		} else {
			echo "<div class='alert alert-danger' role='alert'>O sistema ainda não possui pedidos. =(</div>";
		}
		include ("rodape.php");
		break;
		
	default:
		
}