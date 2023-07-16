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
	<h3 class="text-white">Gerencia - Infinity - Inclusão</h3>
	<?php
			include_once('conexao.php');
			// recuperando 
			$codigo = $_POST['codigo'];
			$produto = $_POST['produto'];	
			$descricao = $_POST['descricao'];	
			$data = $_POST['data'];	
			$imagem = ""; //variável para armazenar o nome da imagem para mandar para o Banco de dados

			// Tutorial de upload de arquivos
			// https://www.w3schools.com/php/php_file_upload.asp

			// Pasta onde serão gravadas as imagens
			$target_dir = "imagens/";
			// Caminho + nome da imagem
			$target_file = $target_dir . basename($_FILES["imagem"]["name"]);
			// Variável para controlar o upload
			$uploadOk = 1;
			// obtendo a extensão do arquivo para verificarmos o tipo dele
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if(isset($_POST["submit"])) {
				// Verificando se o arquivo é mesmo uma imagem 
				// O getimagesize vai retornar o tamanho da imagem ou um erro se não for imagem o arquivo
				$check = getimagesize($_FILES["imagem"]["tmp_name"]);
				if($check !== false) {
					echo "<p>O arquivo é uma imagem do tipo " . $check["mime"] . ".</p>";
					$uploadOk = 1;
				} else {
					echo "<p>O arquivo não é de imagem.</p>";
					$uploadOk = 0;
				}
			}

			// Verificando se já existe um arquivo com o mesmo nome da pasta onde serão gravadas as imagens
			if (file_exists($target_file)) {
				echo "<p>Desculpe, mas já existe um arquivo no servidor com esse nome.</p>";
				$uploadOk = 0;
			}

			// Verificando o tamanho da imagem, pois por padrão, só são aceitos arquivos com 40MB
			if ($_FILES["imagem"]["size"] > 500000) { // Equivale a menos de 500KB
				echo "<p>Desculpe, mas o arquivo é muito grande.</p>";
				$uploadOk = 0;
			}

			// Limitando os formatos aceitos
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				echo "<p>Desculpe, mas só arquivos JPG, JPEG, PNG e GIF são permitidos.</p>";
				$uploadOk = 0;
			}

			// Verificando se $uploadOk é zero, pois isso indica que houve um erro
			if ($uploadOk == 0) {
				echo "<p>Desculpe, mas seu arquivo não foi enviado para o servidor.</p>";
			// Se tudo estiver certo, vamos mover o arquivo para a pasta definitiva ==> move_uploaded_file
			} else {
				if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
					echo "<h5>O arquivo ". htmlspecialchars(basename( $_FILES["imagem"]["name"])). " foi enviado para o servidor.";
					$imagem = basename($_FILES["imagem"]["name"]); // Nome do arquivo
				} else {
					echo "<h5>Desculpe, houve um erro ao tentar enviar seu arquivo para o servidor.</h5>";
				}
			}

			// criando a linha de INSERT
			$sqlinsert =  "insert into tabelaimg (codigo, produto, descricao, data, imagem) values ('$codigo', '$produto', '$descricao', '$data', '$imagem')";
			
			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sqlinsert);
			if (!$resultado) {
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
			} else {
				echo "<h4>Registro Cadastrado com Sucesso.</h4>";
			} 
			mysqli_close($conexao);
		?>
		<br><br>
		<input type='button' onclick="window.location='index.php';" value="Voltar" class="btn btn-secondary">
	</body>
</html>
