<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Gerencia - infinity </title>

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="javascript/pesquisa.js"></script>
</head>
<body>
	<header>
		<div class="container-fluid">			
			<nav class="navbar navbar-expand-sm">
				<img src="icons/Infinity_ico_copiar.jpg" width="170" height="60" class="d-inline-block align-top" alt="">
				<a class="btn btn-secondary" href="index.php">Home</a>&nbsp;&nbsp;&nbsp;
				<a class="btn btn-secondary" href="inclusao.php">Novo Funcionario</a><br>
				<form action="index.php" method="post">
				</form>
			</nav>
		</div>
	</header>
	<br><br>
		<h3>Gerencia - infinity - Exclusão de funcionario</h3>
		<?php
			include("conexao.php");
			// recuperando 
			// FOI ALTERADO
			$id = $_POST['id'];

			// criando a linha do  DELETE
			// FOI ALTERADO
			$sqldelete =  "delete from  tabelaimg where id = $id ";
			
			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sqldelete);
			if (!$resultado) {
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
			} else {
				echo "<h4>Registro Excluído com Sucesso.</h4>";
			} 
			mysqli_close($conexao);
		?>
		<br><br>
		<input type='button' onclick="window.location='index.php';" value="Voltar"  class="btn btn-secondary botao"> <!-- Alterado -->
	</body>
</html>
