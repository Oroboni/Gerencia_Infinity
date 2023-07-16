<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title> Gerencia - infinity </title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<style>
		.botao {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}

		.imagem {
			border: 1px solid #ddd;
			border-radius: 4px;
			padding: 5px;
			width: 300px;
		}

		.foto {
			border: 1px solid #ddd;
			border-radius: 4px;
			width: 300px;
			display: block;
			margin-left: auto;
			margin-right: auto;
			margin-bottom: 20px;
		}

		.porta {
			max-width: 600px;
			margin-left: auto;
			margin-right: auto;
			padding-left: 100px;
			padding-right: 100px;
			justify-content: center;
			align-items: center;
		}
		tr{
			height: 50px;
		}
	</style>
</head>

<body class="text-light">
	<header>
		<div class="container-fluid">
			<nav class="navbar navbar-expand-sm">
				<img src="./icons/Infinity_ico_copiar.jpg" width="170" height="60" class="d-inline-block align-top" alt="">
				<form action="index.php" method="post">
				</form>
			</nav>
		</div>
	</header>
	<br><br>
	<div class="container">
		<?php
		//função antiga
		// function convertedata2($data) {
		// 	$data_vetor = explode('-', $data);
		// 	$novadata = implode('/', array_reverse($data_vetor));
		// 	return $novadata;
		// }

		//função remodelada para de fato formatar data/hora
		function convertedata($data)
		{
			date_default_timezone_set("America/Sao_Paulo");
			$datanova = date_create($data);
			return date_format($datanova, "d/m/Y");
		}

		include("conexao.php");

		// recuperando a informação da URL
		// verifica se parâmetro está correto e dentro da normalidade 
		if (isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))) {
			$id = base64_decode($_GET['id']);
		} else {
			header('Location: index.php');
		}

		// realizando a pesquisa com o id recebido
		$query = mysqli_query($conexao, "SELECT * FROM tabelaimg WHERE id = $id");


		//echo '<div>';
		//if (!$query) {
		//echo '<input type="button" onclick="window.location=' . "'index.php'" . ';" value="Voltar"><br><br>';
		//die('<b>Query Inválida:</b>' . @mysqli_error($conexao));
		//}
		//echo '<div>';

		$dados = mysqli_fetch_array($query);

		if (empty($dados['imagem'])) {
			$imagem = 'SemImagem.png';
		} else {
			$imagem = $dados['imagem'];
		}

		$produto = $dados['produto'];

		// Imagem do funcionario 
		echo "<div class=\"row\">\n";
		echo "	  <div class=\"col-sm-12 col-xl-12\">\n";
		echo "			<img src=\"imagens/$imagem\" alt=\"$produto\" class=\"foto\" style='border: 1px solid #ddd; border-radius: 10px; padding: 5px;'\n";
		echo "	  </div>\n";
		echo "</div><br>\n";

		// Tabela de informações

		echo "		<table class='table  table-dark	 table-sm porta'>\n";
		echo "			<thead>
		
						</thead>\n";
		echo "			<tbody >\n";
		echo "				<tr>\n";
		echo "					<td>Id</td>\n";
		echo "					<td>" . $dados['id'] . "</td>\n";
		echo "				</tr>\n";
		echo "				<tr>\n";
		echo "					<td>Nome</td>\n";
		echo "					<td>" . $dados['codigo'] . "</td>\n";
		echo "				</tr>\n";
		echo "				<tr>\n";
		echo "					<td>Endereço</td>\n";
		echo "					<td>" . $dados['produto'] . "</td>\n";
		echo "				</tr>\n";
		echo "				<tr>\n";
		echo "					<td>Departamento</td>\n";
		echo "					<td>" . $dados['descricao'] . "</td>\n";
		echo "				</tr>\n";
		echo "				<tr>\n";
		echo "					<td>Dt. Nascimento</td>\n";
		echo "					<td>" . convertedata($dados['data']) . "</td>\n";
		echo "				</tr>\n";
		echo "			</tbody>\n";
		echo "		</table>\n";
		mysqli_close($conexao);
		?>
		<!-- Botão voltar -->
		<div class="col-sm-12 col-xl-12">
			<input type='button' onclick="window.location='index.php';" value="Voltar" class="btn btn-secondary botao">
		</div>


	</div>
</body>

</html>