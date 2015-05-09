<?php include ("cabecalho.php");
$ar_prod=listarProdutoPorId($_GET['prod']);
?>
	<h1>Gerar Pedido de Venda</h1>
	<form class="form-horizontal" role="form" action="controlador_pedido.php" method="POST">
  			<div class="form-group">
    				<label class="control-label col-sm-2">Código:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="codigo" id="codigo" value="<?=$ar_prod[0]['id'] ?>" readonly="readonly">
    			</div>
  			</div>
  			<div class="form-group">
    				<label class="control-label col-sm-2">Descrição:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="descricao" id="descricao" value="<?=$ar_prod[0]['descricao'] ?>" readonly="readonly">
    			</div>
  			</div>
  			<div class="form-group">
    				<label class="control-label col-sm-2">Estoque Atual:</label>
    			<div class="col-sm-10"> 
      				<input type="number" class="form-control" name="estoque_atual" id="estoque_atual" value="<?=$ar_prod[0]['estoque_atual'] ?>" readonly="readonly">
    			</div>
  			</div>
  			<div class="form-group">
    				<label class="control-label col-sm-2">Preço de Venda:</label>
    			<div class="col-sm-10"> 
      				<input type="text" class="form-control" name="preco_venda" id="preco_venda" value="<?=$ar_prod[0]['preco_venda'] ?>" readonly="readonly">
    			</div>
  			</div>
  			<div class="form-group">
    				<label class="control-label col-sm-2">Quantidade:</label>
    			<div class="col-sm-10">
      				<input type="number" class="form-control" name="qtd" id="qtd" required autofocus placeholder="Digite a quantidade à ser comprada">
    			</div>
  			</div>
  			<div class="form-group"> 
    			<div class="col-sm-offset-2 col-sm-10">
      				<button type="submit" class="btn btn-primary">Comprar</button>
    			</div>
  			</div>
  				<input type="hidden" name="acao" value="gerar_pedido" />
		</form>
<?php include ("rodape.php");?>