<?php 
include_once "banco.php";

	function salvarPedido ($array_pedido) {
		GLOBAL $conexao;
		$array_pedido['valor_total']=$array_pedido['preco_venda']*$array_pedido['qtd'];
		#echo $array_pedido['valor_total'];
		$array_pedido['estoque_atualizar']=$array_pedido['estoque_atual'] - $array_pedido['qtd'];
		#echo $array_pedido['estoque_atualizar'];
		$update = "UPDATE PRODUTO SET PRODUTO.ESTOQUE_ATUAL = '{$array_pedido['estoque_atualizar']}' WHERE PRODUTO.ID = {$array_pedido['codigo']}";
		#echo $update;
		$sql = "INSERT INTO PEDVEND (CODPRODUTO, QTD, VALOR_PROD, VALOR_TOTAL) VALUES ({$array_pedido['codigo']},";
		$sql.= "{$array_pedido['qtd']}, {$array_pedido['preco_venda']}, {$array_pedido['valor_total']});";
		
		if(mysql_query($sql, $conexao)){
			mysql_query($update,$conexao);
			return true;
		}else{
		return false;
		}
		#exit($sql);
	}
	
	function listarPedido() {
		GLOBAL $conexao;		
		$listagem = "select pd.codpedvend, pd.codproduto, prod.descricao, pd.qtd,";
		$listagem.= " Concat ('R$ ', Format(pd.valor_prod,2)) as valorprod, Concat ('R$ ', Format(pd.valor_total,2)) as valortotal";
		$listagem.= " from pedvend pd join produto prod on (prod.id = pd.codproduto);";
		$pedidos=array();
		$resultado=mysql_query($listagem,$conexao);
		while($fetch = mysql_fetch_array($resultado,MYSQL_ASSOC)){
			$pedidos[]=array('codpedvend'=> $fetch["codpedvend"],'codproduto'=> $fetch["codproduto"],'descricao'=> $fetch["descricao"],'qtd'=> $fetch["qtd"],'valorprod'=> $fetch["valorprod"],'valortotal'=> $fetch["valortotal"]);
		}
		return $pedidos;
	}
	
	function totalPedido() {
		GLOBAL $conexao;
		$query = "select Concat('R$ ',Format(sum(pedvend.valor_total),2)) as TOTAIS from pedvend";
		$totais=array();
		$resultado=mysql_query($query, $conexao);
		while ($fetch = mysql_fetch_array($resultado,MYSQL_ASSOC)) {
			$totais[]=array('totais'=> $fetch["TOTAIS"]);
		}
		
		return $totais;
	}
?>