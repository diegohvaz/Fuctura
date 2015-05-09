<?php
#Estabelece conexão com o banco de dados 
# A função recebe 3 parâmetros servidor, usuário e senha
$conexao = mysql_connect("localhost", "root", "");
#a função seleciona o banco a ser utilizado
mysql_select_db("estokweb", $conexao);
?> 