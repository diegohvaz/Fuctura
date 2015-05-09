<?php
/*
Esse arquivo faz as operações no banco de dados aplicáveis aos usuários
Ele tanto recebe dados como também envia. 
*/
#importa o arquivo que contém os parâmetros de conexão do banco.
include_once "banco.php";

#função utilizada quando o usuário faz o login.
/*
Essa função recebe como parâmetro um array contendo dados de login e senha
e verifica se esses dados estão na tabela do usuário, caso ele encontre as informações
no banco ele retorna o id e o nome do usuário, se não encontrar ele retorna falso.
*/
function verificarLogin($ar_usu){
	GLOBAL $conexao;# a variável é a mesma presente em banco.php, transformada como global
	#a variável $sql contém uma string select que verifica o login e senha 
	$sql="select id,nome from usuario where ";	 
	$sql.="login like '".$ar_usu['login']."'"; 
	$sql.=" and senha like '".$ar_usu['senha']."'"; 
	$sql.=" and tipo like '".$ar_usu['tipo']."';"; 
	#array para guardar dados do usuário
	$usu=array(); 
	#mysql_query() função que executa uma query caso seja select ela 
	#retorna o resultado do select, se o resultado for vazio ela retorna false.
	#o retorno da função mysql_query é armazenado em $resultado
	$resultado=mysql_query($sql,$conexao);
		
		#A função mysql_fetch_array lê linha por linha do resultado do select. 
		#Ela recebe 2 parâmetros um que é a variável o resultado da execução da query($resultado)
		# e o outro que é define o tipo de associação vai ser usado na organização do dados
		# se vai ser apenas numérico(MYSQL_NUM)	$fetch[0],$fetch[1];	
		# se var ser associado apenas aos nomes (MYSQL_ASSOC) $fetch["id"], $fetch["nome"]
		# ou padrão que é  MYSQL_BOTH , que contém as outras duas formas.
		# o retorno dessa função será um array contendo os dados de uma linha da tabela.
		# A estrutura de repetição permite que todas as linhas encontradas no select sejam lidas
		while($fetch = mysql_fetch_array($resultado,MYSQL_ASSOC)){
			#adiciono dentro do array $usu o valor do 
			#id e nome do usuário fazendo associaçào aos nomes id e nome
			$usu['id']= $fetch["id"];
			$usu['nome']= $fetch["nome"];
		}
		#retorno o array para quem chamou a função
		return $usu;
}


/*
A função salvarUsuario() recebe como parâmetro um array 
contendo os dados do usuário que será salvo no banco.
Caso os dados estejam corretos será retornado verdadeiro 
para quem chamou a função, se não será retornado falso.

*/
function salvarUsuario($ar_usu){
	GLOBAL $conexao;
	#sql de inserção
	$sql="insert into usuario (nome, cpf, login, senha, tipo) values(";
	$sql.="'".$ar_usu['nome']."',";
	$sql.="'".$ar_usu['cpf']."',"; 
	$sql.="'".$ar_usu['login']."',"; 
	$sql.="'".$ar_usu['senha']."',"; 
	$sql.="'".$ar_usu['tipo']."'"; 
	$sql.= ");";
	#exit($sql); #essa função é usuada para parar a execução do 
	
	#código e exibir uma mensagem, se desejavel.
	#Se a função mysql_query conseguiu executar a query, sera retornado 
	#verdadeiro para quem chamou, caso contrário será retornado falso.
	if(mysql_query($sql, $conexao)){
		return true;
	}else{
		return false;
	}
}




/*
A função alterarUsuario, altera os dados de um usuário existente.
Ela recebe como parâmetro um array contendo as informações a serem alteradas.
*/
function alterarUsuario($ar_usu){
	GLOBAL $conexao;
	$sql="update usuario set ";
	if (!empty($ar_usu['nome'])) $sql.="nome='".$ar_usu["nome"]."'"; 
	if (!empty($ar_usu['senha'])) $sql.=", senha='".$ar_usu["senha"]."'"; 
	if (!empty($ar_usu['tipo'])) $sql.=", tipo='".$ar_usu["tipo"]."'"; 
	$sql.=" where cpf like '".$ar_usu["cpf"]."';"; 
	 
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
function listarUsuario($ar_usu){
	GLOBAL $conexao;
	$resultado_sql=array();
	$resultado_busca=array();
	$sql="select * from usuario where ";	
	#print_r($ar_usu);
	
	#O if verifica se o número de elementos no array é maior que 1
	if(count($ar_usu)>1){
		#variável que será utilizada como contador para ajudar a motar uma query com mais de 1 campo
		$conta=1;
		#foreach percorre todo o array pegando os indices e seus respectivos valores.
		foreach($ar_usu as $usu=>$key){
			#se o número  de elementos for maior que o contador $conta
			if(count($ar_usu)>$conta){
				#monto a sql com o and no final, pois ainda haverá 
				#mais informações a serem adicionadas a query
				$sql.="$usu like '%".$ar_usu["$usu"]."%' and "; 
			}else{
				#quando o número  de elementos for menor que o contador $conta
				# a query será montada sem o and no final
				$sql.="$usu like '%".$ar_usu["$usu"]."%'"; 
			}
			$conta++;#adiciona +1 um ao valor da variável
		}		
	}else{
		#count($ar_usu) tiver um elemento a query conterá apenas uma informação.
		foreach($ar_usu as $usu=>$key){			 
				$sql.="$usu like '".$ar_usu["$usu"]."'"; 			 
		}	
	}  	
	$resultado_sql=mysql_query($sql, $conexao);		
	#exit($sql);
	if($resultado_sql){
		while ($linha = mysql_fetch_row($resultado_sql)) {
		 
			$resultado_busca[]=array(
			'id'=>$linha[0],'nome'=>$linha[1],
			'cpf'=>$linha[2],'login'=>$linha[3],
			'tipo'=>$linha[4]);	
		}
		
		 return $resultado_busca;
	}else{
		return false;
	}
	
}
/*
Função  deletarUsuario(), deleta um usuário do banco.
Ela recebe como parâmetro um array contendo a informação necessário para deletar o usuário.
É retornado verdadeiro se o usuário foi deleteado, se não é retornado falso.
*/
function deletarUsuario($ar_usu){
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