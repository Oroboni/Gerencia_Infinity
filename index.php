<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title> Gerencia - infinity </title>

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="javascript/pesquisa.js"></script>
	<style>
		.left {
			right: 20%;
			top: 30;
			position: relative;
			width: 20%;
		}

		.right {
			left: 80%;
			position: relative;
			width: 20%;
			height: 10%;
		}

		.icon {
			position: relative;
			right: 20%;
		}
	</style>
</head>

<body>
	<header>
		<div class="container-fluid">
			<nav class="navbar navbar-expand-sm">

				<!-- // Aba de pesquisa -->
				<div class="input-group right">
					<input type="text" id="produto" name="produto" class="form-control" placeholder="Nome do Gerente">
					<input type="submit" value="Buscar" class="btn btn-outline-light">
				</div>

				<!-- icon da pagina -->
				<div class="icon">
					<img src="icons/Infinity_ico_copiar.jpg" width="170" height="60" class="d-inline-block align-top" alt="">
				</div>

				<!-- Botão "Novo funcionario" -->
				<div class="left">
					<a class="btn btn-secondary" href="inclusao.php">Novo Funcionario</a><br>
					<form action="index.php" method="post"></form>
				</div>

			</nav>
		</div>
	</header>
	<br><br>
	<?php
	include("conexao.php");

	// ajustando a instrução select para ordenar por produto
	$sql = "select * from tabelaimg order by id";

	// verificando se o form de consulta chamou a página
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$produto = $_POST['produto'];
		$sql = "select * from tabelaimg where produto like '%" . $produto . "%' order by produto";
	}

	$query = mysqli_query($conexao, $sql);

	// botão voltar
	// if (!$query) {
	// 	echo '<input type="button" onclick="window.location=' . "'index.php'" . ';" value="Voltar"><br><br>';
	// 	die('<b>Query Inválida:</b>' . @mysqli_error($conexao));
	// }

	function convertedata($data)
	{
		date_default_timezone_set("America/Sao_Paulo");
		$datanova = date_create($data);
		return date_format($datanova, "d/m/Y");
	}

	echo '<div>';
	// Tabela
	echo '<table class="table city">';
	echo "<thead> <tr class='table-dark'>
			<th width='1px'>Id</th>
			<th width='100px'>Nome</th>
			<th width='200px'>Endereço</th>
			<th width='1px'>Departamento</th>
			<th width='100px'>Dt. Nascimento</th>
			<th width='100px'>Foto</th>
			<th width='200px'>Opções</th>
			</tr> </thead> <tbody id=\"tabela\">";
	echo '</div>';

	while ($dados = mysqli_fetch_array($query)) {
		echo "<tr style='color: white;'class='table-secondary'>";
		echo "<td style='color: white;'>" . $dados['id'] . "</td>";
		echo "<td style='color: white;'>" . $dados['codigo'] . "</td>";
		echo "<td style='color: white;'>" . $dados['produto'] . "</td>";
		echo "<td style='color: white;'>" . $dados['descricao'] . "</td>";
		echo "<td style='color: white;' width='80' height='80' > " . convertedata($dados['data'])  . "</td>";

		// buscando a na pasta imagem
		if (empty($dados['imagem'])) {
			$imagem = 'SemImagem.png';
		} else {
			$imagem = $dados['imagem'];
		}
		$id = base64_encode($dados['id']);

		echo "<td>
				<a href='verproduto.php?id=$id'>
					<img src='imagens/$imagem' class='rounded' width='50px'>
				</a>
			</td>";

		// Botões de "Visualizar" , "Editar" e "Apagar"
		echo "<td> <div class='justify-content-end'>
				<a href='verproduto.php?id=$id' class='btn btn-primary'><img  width='25' height='25' src='./icons/visu.png'></a>
				<a href='veralteracao.php?id=$id' class='btn btn-warning'><img width='25' height='25' src='./icons/edit.jpeg'></a>
				<a href='verexclusao.php?id=$id' class='btn btn-danger'><img width='25' height='25' src='./icons/lixo.png'></a>
			</td></div>";

		echo "</tr>";
	}
	echo "</tbody> </table>";


	mysqli_close($conexao);
	?>	
	<script>
		$(document).ready(function() {
			$("#produto").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#tabela tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
				});
			});
		});
	</script>
</body>

</html>