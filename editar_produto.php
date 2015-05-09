<?php include ("cabecalho.php");
include 'modelo_categoria.php';
$ar_prod=listarProdutoPorId($_GET['prod']);
$ar_cat=listarCategorias();
?>
		<h1>Alteração de cadastro de Produto</h1>
		<!-- <form action="controlador_produto.php?acao=salvarEdicaoProduto" method="POST" >
		<table class="table table-striped table-bordered">
			<tr>
				<td>Código</td>
				<td><input name="id" type="text" value="<?=$ar_prod[0]['id'] ?>" readonly ></td>
			</tr>
			<tr>
				<td>Nome</td>
				<td><input name="descricao" type="text" value="<?=$ar_prod[0]['descricao'] ?>"></td>
			<tr>			 
		</table>
			<button class="btn btn-primary" type="submit">Alterar</button>
		</form>  -->
		
		<form class="form-horizontal" role="form" action="controlador_produto.php?acao=salvarEdicaoProduto" method="POST">
  			<div class="form-group">
    				<label class="control-label col-sm-2">Código:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="id" id="id" value="<?=$ar_prod[0]['id'] ?>" readonly="readonly">
    			</div>
  			</div>
  			<div class="form-group">
    				<label class="control-label col-sm-2">Descrição:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="descricao" id="descricao" value="<?=$ar_prod[0]['descricao'] ?>">
    			</div>
  			</div>
  			<div class="form-group">
    				<label class="control-label col-sm-2">Estoque Mínimo:</label>
    			<div class="col-sm-10"> 
      				<input type="number" class="form-control" name="estoque_minimo" id="estoque_minimo" value="<?=$ar_prod[0]['estoque_minimo'] ?>">
    			</div>
  			</div>
  			<div class="form-group">
    				<label class="control-label col-sm-2">Estoque Atual:</label>
    			<div class="col-sm-10"> 
      				<input type="number" class="form-control" name="estoque_atual" id="estoque_atual" value="<?=$ar_prod[0]['estoque_atual'] ?>">
    			</div>
  			</div>
  			<div class="form-group">
    				<label class="control-label col-sm-2">Preço de Custo:</label>
    			<div class="col-sm-10"> 
      				<input type="text" class="form-control" name="preco_custo" id="preco_custo" value="<?=$ar_prod[0]['preco_custo'] ?>">
    			</div>
  			</div>
  			<div class="form-group">
    				<label class="control-label col-sm-2">Preço de Venda:</label>
    			<div class="col-sm-10"> 
      				<input type="text" class="form-control" name="preco_venda" id="preco_venda" value="<?=$ar_prod[0]['preco_venda'] ?>">
    			</div>
  			</div>
  			<!-- <div class="form-group">
    				<label class="control-label col-sm-2">Categoria:</label>
    			<div class="col-sm-10"> 
      				<input type="text" class="form-control" name="categoria_id" id="categoria_id" value="<?=$ar_prod[0]['categoria_id'] ?>">
    			</div>
  			</div>  -->
  			<div class="form-group">
    				<label class="control-label col-sm-2">Categoria:</label>
    			<div class="col-sm-10"> 
    				<select class="form-control" name="categoria_id" id="categoria_id">
    					<option value="">Escolha uma Categoria</option>
      				<?php foreach ($ar_cat as $cat):?>
      					<option value="<?php echo $cat['id'];?>">
							<?php echo $cat['nome'];?>
						</option>
					<?php endforeach;?>
					</select>
      					
      				
    			</div>
  			</div>
  			<div class="form-group"> 
    			<div class="col-sm-offset-2 col-sm-10">
      				<button type="submit" class="btn btn-primary">Alterar Cadastro</button>
    			</div>
  			</div>
  				<input type="hidden" name="acao" value="gerar_pedido" />
		</form>
<?php include ("rodape.php");?>