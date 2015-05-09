<?php

/*
Esse arquivo separa e faz o controle das funções aplicáveis aos usuários
Ele também monta algumas visualizações para serem exibidas nos arquivos de visualização.
*/


#importa o arquivo
include_once 'modelo_usuario.php';

//habilita o acesso aos dados de controle da sessão.
session_start();
//isset - verifica se  exite valor setado para $_GET['acao']  
if(isset($_GET['acao'])){
$acao=$_GET['acao'];

}
//os switch funciona como interruptor que liga o parâmetro que está atribuido à vaiável $acao
switch ($acao) {
	#opção que verifica se o login e a senha pertecem a um usuário 
	
    case 'verificarLoginCliente':		 
		$ar_usu['login']=$_POST['login'];
		$ar_usu['senha']=$_POST['senha'];
		$ar_usu['tipo']='c';
		#executa a função presente no modulo_usuario.php para verificar login e senha
		$resultado=verificarLogin($ar_usu);
		#caso os dados sejam de um usuário é iniciada uma sessão
		if($resultado){	
			$_SESSION["cliente_id"]=$resultado['id'];
			$_SESSION["cliente_nome"]=$resultado['nome'];
			setcookie('cliente_id', $resultado['id'], time() + (120), "/");
			setcookie('cliente_nome', $resultado['nome'], time() + (120), "/");			
			#depois de atribuídos os dados da  sessão, é direcionado para  página main.php
			header("location:index.php");
			//echo "<script>location.href='./main.php'</script>";
		#caso os dados não perteçam a usuário, e exibida uma mensagem.
		}else{
			echo "<script> alert('Não foi possível realizar o login na página.')</script>"; 
			echo "<script>location.href='./login_cliente.php'</script>";
		 }		      
        break;
	
	#Opção para salvar os dados de um novo usuário	
    case "salvarUsuario":
		#Os dados vindo do formulário de cadastro do usuário são armazenados em um array	
		$ar_usu['nome']=$_POST['nome'];
		$ar_usu['cpf']=$_POST['cpf'];
		$ar_usu['login']=$_POST['login'];
		$ar_usu['senha']=$_POST['senha'];
		$ar_usu['tipo']='c';	
		if(salvarUsuario($ar_usu)){
			echo "<script> alert('Usuário Salvo com sucesso!.')</script>"; 
			echo "<script>location.href='./login_cliente.php'</script>";
		}else{
			 		 
			 echo "<script> alert('Não foi possível salvar o usuário.')</script>"; 			 
		 }         
        break;
	
	#opção para alterar os dados de um usuário
    case "alterarUsuario":
		#Os dados vindo do formulário de alteração do usuário são armazenados em um array	
		$ar_usu['nome']=$_POST['nome'];
		$ar_usu['cpf']=$_POST['cpf'];
		$ar_usu['login']=$_POST['login'];
		$ar_usu['senha']=$_POST['senha'];
		$ar_usu['tipo']=$_POST['tipo'];
		#a função é executada dentro de um if
		if(alterarUsuario($ar_usu)){
			#se os dados foram alterados há um redirecionamento da página
			echo "<script>location.href='main.php'</script>";
		}else{
		#se os dados não foram alterados é exibida uma mensagem 
			 echo "<font face=verdana size=2>";			 
			 echo "<br>";
			 echo "Não foi possível alterar o usuário. <a href=main.php>";
			 echo "Clique aqui</a> para tentar novamente.";
			 echo "</a></font>";
		 }        
        break;
	#opção para remover os dados de um usuário
	case "removerUsuario":
		#A remoção se dá por meio do cpf 
		$ar_usu['cpf']=$_POST['cpf'];
		#a função deletarUsuario($ar_usu) esxecuta a exclusão dos dados do usuário dentro if
       if( deletarUsuario($ar_usu)){
			# se a exclusão foi bem sucedida a página e redirecionada para main.php
			echo "<script>location.href='main.php'</script>";
		}else{
			#se não foi possível a exclusão é exibida uma mensagem
			 echo "<font face=verdana size=2>";			 
			 echo "<br>";
			 echo "Não foi possível deletar o usuário. <a href=main.php>";
			 echo "Clique aqui</a> para tentar novamente.";
			 echo "</a></font>";
		}        
        break;
	#opcão para listar todos os usuários presentes no banco.
	case "listarUsuario":
		$ar_usu=array();
		#Os dados vindo do formulário de busca do usuário são armazenados em um array		
		#se o valor do campo for difernete de espaço em branco, o valor é adicionado ao array
		if($_POST['nome']!='')$ar_usu['nome']=$_POST['nome'];
		if($_POST['cpf']!='')$ar_usu['cpf']=$_POST['cpf'];
		if($_POST['login']!='')$ar_usu['login']=$_POST['login'];
		if($_POST['tipo']!='')$ar_usu['tipo']=$_POST['tipo'];
		$resultado=array();
		#A função  listarUsuario() retorna os usuários encontrados que 
		#possuir as mesmas informações contidas no  $ar_usu
		$resultado=listarUsuario($ar_usu);	
		#É gerado a exibiçào da lista de usuários presente n $resultado
		foreach($resultado as $usu){
			echo "<h3>| ID: ".$usu['id'].
			" | NOME: ".$usu['nome'].
			" | CPF: ".$usu['cpf'].
			" | TIPO: ".$usu['tipo'].
			" |</h3><br />";
		}        
        break;
	#opção para finalizar uma sessào
	case 'logout':
		// remove todas as variáveis de sessões  
		session_unset();
		// destroi a sessão
		session_destroy(); 
		echo "<script>location.href='login_cliente.php'</script>";
	break;
   
    
         
} 