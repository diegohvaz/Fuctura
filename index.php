<?php #include ("verifica.php")?>
<?php include ("cabecalho.php");?>
	<div class="alert alert-success" role="alert">Olá <?php echo $_SESSION["cliente_nome"]; ?>, Bem Vindo Estok WEB</div>
	
	<h3><span class="label label-warning">Atenção</span> O sistema em fase de construção, portanto alguns recursos são limitados</h3>
	<h3><span class="label label-info">Informações</span> Funcionalidades disponíveis na atual versão:</h3>
	
	<div class="container">
	<ul>
		<li>Adicionar, Editar, Listar e Remover Produtos.</li>
		<li>Adicionar, Editar, Listar e Remover Categorias.</li>
		<li>Gerar pedidos de venda de apenas um produto.</li>
		<li>Visualizar pedidos gerados no sistema.</li>
	</ul>
	
	<h3><span class="label label-info">Informações</span> Funcionalidades disponíveis na próxima atualização:</h3>
		
	<ul>
		<li>Melhorias na geração do pedido de venda.</li>
		<li>Geração de pedidos com vários produtos.</li>
		<li>Acesso Multi-Usuário</li>
		<li>Cadastro de Clientes, Fornecedores, Fabricantes, Funcionários.</li>
		<li>Associação de Clientes aos Pedidos de Venda</li>
		<li>Gerenciamento dos Usuários do Sistema (Edição, Listagem e Remoção de Cadastro)</li>
		<li>Adicionar Notas fiscais de Entrada.</li>
		<li>Gerar Notas Fiscais de Venda.</li>
		<li>Aprimoramento do controle do estoque.</li>
		<li>Criação de Subcategorias de Produtos.</li>
	</ul>
	</div>
<?php include ("rodape.php");?>	