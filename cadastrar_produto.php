<?php
include ("cabecalho.php");
include 'modelo_categoria.php';

$array_categoria=listarCategorias();
?>
		<h1>Cadastro de Produto</h1>
				
		<form class="form-horizontal" role="form" action="controlador_produto.php?acao=salvarProduto" method="POST">
  			<div class="form-group">
    				<label class="control-label col-sm-2">Descrição:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="descricao" id="descricao" placeholder="Digite a Descrição do Produto" required autofocus>
    			</div>
  			</div>
  			<div class="form-group">
    				<label class="control-label col-sm-2">Estoque Mínimo:</label>
    			<div class="col-sm-10"> 
      				<input type="number" class="form-control" name="estoque_minimo" id="estoque_minimo" placeholder="Digite a quantidade mínima de estoque necessária"  required autofocus>
    			</div>
  			</div>
  			<div class="form-group">
    				<label class="control-label col-sm-2">Estoque Atual:</label>
    			<div class="col-sm-10"> 
      				<input type="number" class="form-control" name="estoque_atual" id="estoque_atual" placeholder="Digite a quantidade atual no estoque"  required autofocus>
    			</div>
  			</div>
  			<div class="form-group">
    				<label class="control-label col-sm-2">Preço de Custo:</label>
    			<div class="col-sm-10"> 
      				<input type="text" class="form-control" name="preco_custo" id="preco_custo" placeholder="Digite o valor de custo do produto"  required autofocus>
    			</div>
  			</div>
  			<div class="form-group">
    				<label class="control-label col-sm-2">Preço de Venda:</label>
    			<div class="col-sm-10"> 
      				<input type="text" class="form-control" name="preco_venda" id="preco_venda" placeholder="Digite o valor de venda do produto"  required autofocus>
    			</div>
  			</div>
  			<!-- <div class="form-group">
    				<label class="control-label col-sm-2">Categoria:</label>
    			<div class="col-sm-10"> 
      				<input type="number" class="form-control" name="categoria_id" id="categoria_id" placeholder="Digite o código da categoria do produto">
    			</div>
  			</div>  -->
  			<div class="form-group">
    				<label class="control-label col-sm-2">Categoria:</label>
    			<div class="col-sm-10"> 
    				<select class="form-control" name="categoria_id" id="categoria_id">
    					<option value="">Escolha uma Categoria</option>
      				<?php foreach ($array_categoria as $cat):?>
      					<option value="<?php echo $cat['id'];?>">
							<?php echo $cat['nome'];?>
						</option>
					<?php endforeach;?>
					</select>
      					
      				
    			</div>
  			</div>
  			<div class="form-group"> 
    			<div class="col-sm-offset-2 col-sm-10">
      				<button type="submit" class="btn btn-default">Cadastrar</button>
      				<button type="reset" class="btn btn-default">Limpar</button>
    			</div>
  			</div>
		</form>
		
<?php include ("rodape.php");?>