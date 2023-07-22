<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<title> Gerencia - infinity </title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="javascript/bootstrap.min.js"></script>
		<script src="javascript/pesquisa.js"></script>

		<style>
			.body{
				height:100%;
				width: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				background-color: #5E6183;
			}
			.img_fundo{
				width: 80%;
				display: flex;
				justify-content: left;
				padding: 1rem	;
			}
			.container{
				align-items: center;
				width: 80%;
				height: 80%;
				padding: 1%;
				/* background-color: #5E6183; */
				box-shadow: 5px 5px 10px rgba(1, 1, 1, 1);
				display: flex;
			}

			.atual {
				border: 1px solid #ddd;
				border-radius: 4px;
				padding: 5px;
				width: 70%;
				height: 70%;
				position: relative;
				left:55%;
			}

			.perfil {
				align-items: center;
				width: 50%;
				height: 50%;
			}

			.texto {
				position: relative;
				left:80%;
			}

		</style>
	</head>

	<body>

		<!-- Titulo -->
		<div class="container-fluid">
			<div class="text-center"><h1>Alterar dados</h1></div>
		</div>

		<?php
			// Acrescentado
			//função remodelada para de fato formatar data/hora
			function convertedata($data)
			{
				date_default_timezone_set("America/Sao_Paulo");
				$datanova = date_create($data);
				return date_format($datanova, "Y-m-d");
			}

			include("conexao.php");
			// recuperando a informação da URL
			// verifica se parâmetro está correto e dento da normalidade 
			if (isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))) {
				$id = base64_decode($_GET['id']);
			} else {
				header('Location: index.php');
			}

			// criando a linha do  SELECT
			$sqlconsulta =  "select * from tabelaimg where id = $id";

			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sqlconsulta);
			if (!$resultado) {
				echo '<input type="button" onclick="window.location=' . "'index.php'" . ';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>' . @mysqli_error($conexao));
			} else {
				$num = @mysqli_num_rows($resultado);
				if ($num == 0) {
					echo "<b>Código: </b>não localizado !!!!<br><br>";
					echo '<input type="button" onclick="window.location=' . "'alteracao.php'" . ';" value="Voltar"><br><br>';
					exit;
				} else {
					$dados = mysqli_fetch_array($resultado);
				}
			}
			mysqli_close($conexao);
			// Acrescentado
			$imagem = "SemImagem.png";
			if (!empty($dados['imagem'])) {
				$imagem = $dados['imagem'];
			}
		?>
		<div class="container">

			<!-- Formulario -->
			<form name="produto" action="alterar.php" method="post" enctype="multipart/form-data"> <!-- ALTERADO -->
				<input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Foi incluido  -->
				<!-- Campo nome -->
				<div class="mb-3">
					<label for="codigo" class="form-label"><b>Nome:</b></label>
					<input type="text" class="form-control bg-dark text-white" name="codigo" value="<?php echo $dados['codigo']; ?>">
				</div>
				<!-- Campo endereço -->
				<div class="mb-3">
					<label for="produto" class="form-label"><b>Endereço:</b></label>
					<input type="text" class="form-control bg-dark text-white" name="produto" value="<?php echo $dados['produto']; ?>">
				</div>
				<!-- Campo departamento -->
				<div class="mb-3">
					<label for="descricao" class="form-label"><b>Departamento:</b></label>
					<input type="text" class="form-control bg-dark text-white" name="descricao" value="<?php echo $dados['descricao']; ?>">
				</div>
				<!-- Campo data de nascimento -->
				<div class="mb-3">
					<label for="data" class="form-label"><b>Data de Nascimento:</b></label>
					<input type="date" name="data" class="form-control bg-dark text-white" value="<?php echo convertedata($dados['data']); ?>">
				</div>
				<!-- Campo foto -->
				<div class="mb-3">
					<label for="imagem" class="form-label"><b>Foto:</b></label>
					<input type="file" name="imagem" class="form-control bg-dark text-white">
				</div>
				<!-- Campo botões -->
				<div class="btn-group" role="group">
					<input type="submit" value="Ok" class="btn btn-secondary">&nbsp;&nbsp;
					<input type="reset" value="Limpar" class="btn btn-secondary">&nbsp;&nbsp;
					<input type='button' onclick="window.location='index.php';" value="Voltar" class="btn btn-secondary">
				</div>
			</form>
			<div Class="perfil">
				<div class="texto">
					<label for="foto" class=""><h4>Foto Atual:</h4></label>
				</div>
				<img src="imagens/<?php echo $imagem; ?>" class="atual" name="foto" width="100px">
			</div>
		</div>
	</body>
</html>