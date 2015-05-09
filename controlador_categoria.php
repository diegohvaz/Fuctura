<?php
include_once 'modelo_categoria.php';
header("Content-type: text/html; charset=utf-8");
 

if(isset($_GET['acao'])){
$acao=$_GET['acao'];

}

switch ($acao) {
    case "cadastrarCategoria":
			//require_once("verifica.php");
			
			include_once("cadastrar_categoria.php");
	break;
    case "salvarCategoria":
		$ar_cat['nome']=$_POST['nome'];
		if(salvarCategoria($ar_cat)){
			echo "<script> alert('Categoria Salva com sucesso!.')</script>"; 
			//require_once("verifica.php");
			require_once("cadastrar_categoria.php");
		}else{
			 		 
			 echo "<script> alert('Não foi possível salvar a categoria.')</script>"; 
			 
		 }
         
        break;
    case "listarCategoria":
		$arr_categorias=listarCategorias();
		# print_r($arr_categorias);
		//require_once("verifica.php");
		require_once "cabecalho.php";
		if(!empty($arr_categorias)){
			echo "<h1>Listagem de Categorias</h1>";
			echo "<table class='table table-striped table-bordered'>".
					"<tr>".
					"<td>Código</td>".
					"<td>Descrição</td>".
					"<td>Alterar Cadastro</td>".
					"<td>Remover Categoria</td>".
					"</tr>";
					
			foreach($arr_categorias as $cat){
				echo "<tr><td>".$cat['id']."</td>".
				"<td>".$cat['nome']."</td>".
				"<td><a href='controlador_categoria.php?acao=editarCategoria&cat=".$cat['id']."'>Editar</a></td>".
				"<td><a href='#' onclick='confirmaExclusao(".$cat['id'].")'>Remover</a></td>".				
				"</tr>";
				
				/*
				echo "<h5>".
				$cat['id']."&nbsp".
				$cat['nome']."&nbsp;<a href='fachada.php?acao=editarCategoria&cat=".
				$cat['id']."'>editar</a>&nbsp;<a href='#' onclick='confirmaExclusao(".$cat['id'].")'>remover</a>&nbsp;</h5> ";
				*/
				
			}
			echo "</table>";
		}else{
			echo "<div class='alert alert-danger' role='alert'>O sistema ainda não possui categorias. =(</div>";
		}
        include "rodape.php";
        break;
		
	case "salvarEdicaoCategoria":
	 
        $ar_cat['nome']=$_POST['nome'];
		$ar_cat['id']=$_POST['id'];
		if(alterarCategoria($ar_cat)){
			 echo "<script> alert('Categoria alterada com sucesso')</script>"; 			 
			 echo "<script>location.href='controlador_categoria.php?acao=listarCategoria'</script>";	
		}else{
			echo "<script> alert('Erro ao alterar Categoria')</script>"; 
			echo "<script>location.href='controlador_categoria.php?acao=editarCategoria&cat=".$ar_cat['id']."'</script>";
		}
		
        break;
	case "excluirCategoria":
        $ar_cat['id']=$_GET['cat'];
		
		if(excluirCategoriaPorId($ar_cat['id'])){
			 echo "<script> alert('Categoria excluida com sucesso.')</script>"; 			 
			 echo "<script>location.href='controlador_categoria.php?acao=listarCategoria'</script>";	
		}else{
			echo "<script> alert('erro ao excluir Categoria .')</script>"; 
			echo "<script>location.href='controlador_categoria.php?acao=listarCategoria'</script>";	
		}
        break;
		
	case "editarCategoria":			 
		//require_once("verifica.php");
		include_once("editar_categoria.php");			
		break;
		
	
   
    default:
         
} 