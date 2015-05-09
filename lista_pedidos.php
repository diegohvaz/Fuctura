<?php include ("cabecalho.php");?>
<?php include ("controlador_pedido.php?acao=listar_pedido");
	#$array_pedidos=listarPedidos();
?>
	<div class="alert alert-success" role="alert">Existem <?php ?> Pedidos no sistema atualmente.</div>
<?php include ("rodape.php");?>