<?php
#Verifica se existe valor para variável de sessão $_SESSION["cliente_id"]
session_start();
if(isset($_SESSION["cliente_id"])) {
	header("index.php");
} ?>
<html>
<head>
	<meta charset="utf-8">
	<title>Estok WEB</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/signin.css" rel="stylesheet">
</head>

<body>
	
	<div class="container">
			
							
			<form class="form-signin" action="controlador_usuario.php?acao=verificarLoginCliente" method="POST" >
			<h2 align="center" class="form-signin-heading">Estok WEB</h2>
			<h2 align="center" class="form-signin-heading">Login do Sistema</h2>
			<input class="form-control" name="login" type="text" value="" placeholder="Digite seu login" required autofocus>
			<input class="form-control" name="senha" type="password" value=""  placeholder="Digite sua senha" required autofocus>
			<input type="hidden" name="tipo"   value="c">
			<button class="btn btn-lg btn-primary btn-block">Log In</button>
			<h3 align="center" class="form-signin-heading"><a href="cadastrar_usuario.php">Não tem cadastro ? Cadastre-se</a></h3>
			</form>
						
	</div>
	
	</body>
</html>
