<?php include ("verifica.php")?>
<html>
<head>
	<meta charset="utf-8">
	<title>Estok WEB</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/loja.css" rel="stylesheet">
    <link href="css/sticky-footer.css" rel="stylesheet">
	<script>
		function confirmaExclusao(id) {
 			var r=confirm("Tem certeza que deseja excluir esta categoria???");
			if (r==true) {
			location.href=("controlador_categoria.php?acao=excluirCategoria&cat="+id);
			} 
		}

		function confirmaExclusaoProduto(id) {
   			var r=confirm("Tem certeza que deseja excluir este produto???");
 			if (r==true) {
 	 		location.href=("controlador_produto.php?acao=excluirProduto&prod="+id);
 			}  
		}
	</script>
</head>

<body>
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Estok WEB</a>
				<p class="navbar-text">Conectado como <?php echo $_SESSION["cliente_nome"]; ?></p>
			</div>
			<div>
				<ul class="nav navbar-nav">
  					<li class="dropdown">
  						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Produtos <span class="caret"></span></a>
  						<ul class="dropdown-menu" role="menu">
  							<li><a href="cadastrar_produto.php">Cadastro de Produtos</a></li>
  							<li><a href="controlador_produto.php?acao=listarProdutos">Listagem de Produtos</a></li>
  						</ul>	
  					</li>
  					<li class="dropdown">
  						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categorias <span class="caret"></span></a>
  						<ul class="dropdown-menu" role="menu">
  							<li><a href="cadastrar_categoria.php">Cadastro de Categorias</a></li>
  							<li><a href="controlador_categoria.php?acao=listarCategoria">Listagem de Categorias</a></li>
  						</ul>
  					</li>
  					<li class="dropdown">
  						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pedidos <span class="caret"></span></a>
  						<ul class="dropdown-menu" role="menu">
  							<li><a href="controlador_pedido.php?acao=listar_pedido">Listar Pedidos</a></li>
  						</ul>
  					</li>
  					<li><a href="controlador_usuario.php?acao=logout">Sair do Sistema</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="principal">