<?php include ("cabecalho.php");
//include "modelo_categoria.php";
$ar_cat=listarCategoriaPorId($_GET['cat']); 
?>
		<h1>Edição de Categoria</h1>
		<form action="controlador_categoria.php?acao=salvarEdicaoCategoria" method="POST" >
		<table class="table table-striped table-bordered">
			<tr>
				<td>ID</td>
				<td><input name="id" type="text" value="<?=$ar_cat[0]['id'] ?>" readonly ></td>
			</tr>
			<tr>
				<td>Nome</td>
				<td><input class="form-control" name="nome" type="text" value="<?=$ar_cat[0]['nome'] ?>"></td>
			</tr>
		</table>
				<button class="btn btn-primary" type="submit">Editar</button>
		</form>
		
<?php include ("rodape.php");?>