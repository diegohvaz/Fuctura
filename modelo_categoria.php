<?php
include_once "banco.php";

 
function salvarCategoria($ar_cat){
	GLOBAL $conexao;
	$sql="insert into categoria (nome) values(";
	$sql.="'".$ar_cat['nome']."'";	 
	$sql.= ");";
	//exit($sql);
	if(mysql_query($sql, $conexao)){
		return true;
	}else{
		return false;
	}
}


function alterarCategoria($ar_cat){
	GLOBAL $conexao;
	
	 
	 
	$sql="update categoria set ";
	$sql.="nome='".$ar_cat["nome"]."'"; 	
	$sql.=" where id='".$ar_cat["id"]."';"; 	 
	#exit($sql);
	if(mysql_query($sql, $conexao)){
		return true;
	}else{
		return false;
	}
}  
function listarCategorias(){
	GLOBAL $conexao;
	$sql="select * from categoria;";
	$cate=array(); 
	$resultado=mysql_query($sql,$conexao);	 
	while($fetch = mysql_fetch_array($resultado,MYSQL_ASSOC)){
		$cate[]=array('id'=> $fetch["ID"],'nome'=> $fetch["NOME"]);
	} 	 
	return $cate;
}

function listarCategoriaPorId($id){
	GLOBAL $conexao;
	$resultado_sql=array();
	$resultado_busca=array();
	$sql="select * from categoria where id=$id";	
	
 
	$cate=array(); 
	$resultado=mysql_query($sql,$conexao);	 
	while($fetch = mysql_fetch_array($resultado,MYSQL_ASSOC)){
		$cate[]=array('id'=> $fetch["ID"],'nome'=> $fetch["NOME"]);
	} 	 
	return $cate;
}
function excluirCategoriaPorId($id){
	GLOBAL $conexao;
	$sql="delete from categoria where  id='".$id."';"; 
	 
	 
	if(mysql_query($sql, $conexao)){
		return true;
	}else{
		return false;
	}
}