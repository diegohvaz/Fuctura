<?php
include_once 'modelo_produto.php';
//header("Content-type: text/html; charset=utf-8");
 

if(isset($_GET['acao'])){
$acao=$_GET['acao'];

}

switch ($acao) {
    case "cadastrarProduto":
			//require_once("verifica.php");
			
			include_once("cadastrar_produto.php");
	break;
    case "salvarProduto":
		$ar_prod['descricao']=$_POST['descricao'];
		$ar_prod['estoque_minimo']=$_POST['estoque_minimo'];
		$ar_prod['estoque_atual']=$_POST['estoque_atual'];
		$ar_prod['preco_custo']=$_POST['preco_custo'];
		$ar_prod['preco_venda']=$_POST['preco_venda'];
		$ar_prod['categoria_id']=$_POST['categoria_id'];
		if(salvarProduto($ar_prod)){
			echo "<script> alert('Produto salvo com sucesso!.')</script>"; 
			//require_once("verifica.php");
			require_once("cadastrar_produto.php");
		}else{			 		 
			echo "<script> alert('Não foi possível salvar o produto.')</script>";
			require_once("cadastrar_produto.php");
		}
         
        break;
    case "listarProdutos":
		$arr_produtos=listarProdutos();
		//require_once("verifica.php");
		//require_once "topo.php";
		require_once ("cabecalho.php");
		if(!empty($arr_produtos)){
			echo "<h1>Listagem de Produtos</h1>";
			echo "<table class='table table-striped table-bordered'>".
				 "<tr>".
				 "<td>Código</td>".
				 "<td>Descrição</td>".
				 "<td>Estoque Mínimo</td>".
				 "<td>Estoque Atual</td>".
				 "<td>Preço de Custo</td>".
				 "<td>Preço de Venda</td>".
				 "<td>Comprar Produto</td>".
				 "<td>Alterar Cadastro</td>".
			     "<td>Remover Produto</td>".
				 "</tr>";
			foreach($arr_produtos as $produtos){				
				echo 	"<tr>".
						"<td>".$produtos['id']."</td>".
						"<td>".$produtos['descricao']."</td>".
						"<td>".$produtos['estoque_minimo']."</td>".
						"<td>".$produtos['estoque_atual']."</td>".
						"<td>".$produtos['preco_custo']."</td>".
						"<td>".$produtos['preco_venda']."</td>".
						"<td><a href='controlador_produto.php?acao=comprarProduto&prod=".$produtos['id']."'><img src='img\ico_carrinho.png' width='35px' height='35px'></a></td>".
						"<td><a href='controlador_produto.php?acao=editarProduto&prod=".$produtos['id']."'>Editar</a></td>".
						"<td><a href='#' onclick='confirmaExclusaoProduto(".$produtos['id'].")'>Remover</a></td>".
						"</tr>";				
			}
			echo "</table>";
		} else {
			echo "<div class='alert alert-danger' role='alert'>O sistema ainda não possui produtos. =(</div>";
		}
        include "rodape.php";
        break;
		
	case "salvarEdicaoProduto":
	 	
		$ar_prod['id']=$_POST['id'];
		$ar_prod['descricao']=$_POST['descricao'];
		$ar_prod['estoque_minimo']=$_POST['estoque_minimo'];
		$ar_prod['estoque_atual']=$_POST['estoque_atual'];
		$ar_prod['preco_custo']=$_POST['preco_custo'];
		$ar_prod['preco_venda']=$_POST['preco_venda'];
		$ar_prod['categoria_id']=$_POST['categoria_id'];
		if(alterarProduto($ar_prod)){
			 echo "<script> alert('Produto alterado com sucesso.')</script>"; 			 
			 echo "<script>location.href='controlador_produto.php?acao=listarProdutos'</script>";	
		}else{
			echo "<script> alert('Ocorreu um erro ao alterar o produto.')</script>"; 
			echo "<script>location.href='main.php?acao=editarProduto&prod=".$ar_prod['id']."'</script>";
		}
		
        break;
	case "excluirProduto":
        $ar_prod['id']=$_GET['prod'];
		
		if(excluirProdutoPorId($ar_prod['id'])){
			 echo "<script> alert('Produto excluido com sucesso.')</script>"; 			 
			 echo "<script>location.href='controlador_produto.php?acao=listarProdutos'</script>";	
		}else{
			echo "<script> alert('erro ao excluir Produto .')</script>"; 
			echo "<script>location.href='controlador_produto.php?acao=listarProduto'</script>";	
		}
        break;
		
	case "editarProduto":
		//require_once("verifica.php");
		include_once("editar_produto.php");			
		break;
		
	case "comprarProduto":
		//require_once("verifica.php");
		include_once("pedido_venda.php");
		break;
		
	
   
    default:
         
} 