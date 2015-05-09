<?php
	session_start();
	if(!$_SESSION["cliente_id"]){
		header("location:http://localhost/ProjetoFuctura/login_cliente.php");
		exit;
	}
?>