<html>
<head>
	<meta charset="utf-8">
	<title>Novo Usuário</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/signin.css" rel="stylesheet">
</head>

<body>
	
	<div class="container">
	
		<form class="form-signin " action="controlador_usuario.php?acao=salvarUsuario" method="POST" >
		<h2 align="center" class="form-signin-heading">Cadastro de Usuário</h2>
		<!--Cada campo deve possuir seu nome (name) e tipo (type)-->
		<input class="form-control" name="nome" type="text" value="" placeholder="Nome Completo" required autofocus>
		<input class="form-control" name="cpf" type="text" value="" placeholder="CPF" required autofocus>
		<input class="form-control" name="login" type="text" value="" placeholder="Nome de Usuário" required autofocus>
		<input class="form-control" name="senha" type="password" value="" placeholder="Senha" required autofocus>
		<input name="tipo" type="hidden" value="c">
		<!--Botão que executa o envio dos dados -->
		<button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>	 
		</form>
	</div>
		 
	</body>
</html>
