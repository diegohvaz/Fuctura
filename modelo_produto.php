<?php
include_once "banco.php";

function salvarProduto($ar_prod){
	GLOBAL $conexao;
	$sql="insert into produto (descricao, estoque_minimo, estoque_atual, preco_custo, preco_venda, categoria_id) values(";
	$sql.="'".$ar_prod['descricao']."',"; 
	$sql.="'".$ar_prod['estoque_minimo']."',"; 
	$sql.="'".$ar_prod['estoque_atual']."',";
	$sql.="'".$ar_prod['preco_custo']."',";
	$sql.="'".$ar_prod['preco_venda']."',";
	$sql.="'".$ar_prod['categoria_id']."'"; 
	$sql.= ");";
	if(mysql_query($sql, $conexao)){
		return true;
	}else{
		return false;
	}
}



function alterarProduto($ar_produto){
	GLOBAL $conexao;
	$sql="update produto set ";
	if (!empty($ar_produto['descricao'])) $sql.="descricao='".$ar_produto["descricao"]."'"; 
	if (!empty($ar_produto['estoque_minimo'])) $sql.=", estoque_minimo='".$ar_produto["estoque_minimo"]."'";
	if (!empty($ar_produto['estoque_atual'])) $sql.=", estoque_atual='".$ar_produto["estoque_atual"]."'";
	if (!empty($ar_produto['preco_custo'])) $sql.=", preco_custo='".$ar_produto["preco_custo"]."'";
	if (!empty($ar_produto['preco_venda'])) $sql.=", preco_venda='".$ar_produto["preco_venda"]."'";
	if (!empty($ar_produto['categoria_id'])) $sql.=", categoria_id='".$ar_produto["categoria_id"]."'"; 
	$sql.=" where id like '".$ar_produto["id"]."';";
	#exit($sql);
	if(mysql_query($sql, $conexao)){
		return true;
	}else{
		return false;
	}
}
/*
A função listarUsuario() lista usuários com base em algumas informações.
Essas informações são passadas como parâmetro no array.
*/
function listarProdutos(){
	GLOBAL $conexao;
	$sql="SELECT PRODUTO.ID, PRODUTO.DESCRICAO, PRODUTO.ESTOQUE_MINIMO, PRODUTO.ESTOQUE_ATUAL, CONCAT ('R$', FORMAT (PRODUTO.PRECO_CUSTO,2)) AS PRECO_CUSTO, CONCAT ('R$', FORMAT (PRODUTO.PRECO_VENDA,2)) AS PRECO_VENDA FROM PRODUTO;";
	#$sql="select * from produto;";
	$produto=array();
	$resultado=mysql_query($sql,$conexao);
	while($fetch = mysql_fetch_array($resultado,MYSQL_ASSOC)){
		$produto[]=array('id'=> $fetch["ID"],'descricao'=> $fetch["DESCRICAO"],'estoque_minimo'=> $fetch["ESTOQUE_MINIMO"],'estoque_atual'=> $fetch["ESTOQUE_ATUAL"],'preco_custo'=> $fetch["PRECO_CUSTO"],'preco_venda'=> $fetch["PRECO_VENDA"]);
	}
	return $produto;
}

function listarProdutoPorId($id){
	GLOBAL $conexao;
	$resultado_sql=array();
	$resultado_busca=array();
	$sql="select * from produto where id=$id";

	$produto=array();
	$resultado=mysql_query($sql,$conexao);
	while($fetch = mysql_fetch_array($resultado,MYSQL_ASSOC)){
		$produto[]=array('id'=> $fetch["ID"],'descricao'=> $fetch["DESCRICAO"],'estoque_minimo'=> $fetch["ESTOQUE_MINIMO"],'estoque_atual'=> $fetch["ESTOQUE_ATUAL"],'preco_custo'=> $fetch["PRECO_CUSTO"],'preco_venda'=> $fetch["PRECO_VENDA"],'categoria_id'=> $fetch["CATEGORIA_ID"]);
	}
	return $produto;
}

function deletarProduto($ar_usu){
	GLOBAL $conexao;
	$sql="delete from usuario where cpf like ";	 	 
	$sql.="cpf  like '".$ar_usu["cpf"]."'"; 
	$sql.=";"; 	 
	exit($sql);
	if(mysql_query($sql, $conexao)){
		return true;
	}else{
		return false;
	}
}

function excluirProdutoPorId($id){
	GLOBAL $conexao;
	$sql="delete from produto where  id='".$id."';";
	if(mysql_query($sql, $conexao)){
		return true;
	}else{
		return false;
	}
}