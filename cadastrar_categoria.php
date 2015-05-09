<?php include ("cabecalho.php");?>
		<h1>Cadastro de Categoria</h1>
		<form class="form-horizontal" role="form" action="controlador_categoria.php?acao=salvarCategoria" method="POST">
  			<div class="form-group">
    				<label class="control-label col-sm-2">Nome:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome da Categoria" required autofocus>
    			</div>
  			</div>
  			<div class="form-group"> 
    			<div class="col-sm-offset-2 col-sm-10">
      				<button type="submit" class="btn btn-default">Cadastrar</button>
      				<button type="reset" class="btn btn-default">Limpar</button>
    			</div>
  			</div>
		</form>
<?php include ("rodape.php")?>