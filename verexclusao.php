<!DOCTYPE html>


	<head>
		<meta charset="utf-8">
		<title> Gerencia - infinity </title>

		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="javascript/pesquisa.js"></script>

		<style>
			.perfil {
				align-items: center;
				width: 50%;
				height: 50%;

			}

			.container{
				align-items: center;
				width: 80%;
				height: 80%;
				padding: 3%;
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
			.botoes{
				display: flex;
				position: relative;
				right: 135%;
				top:235px;
			}
		</style>
	</head>

	<body class="text-light">
		
		<!-- Titulo -->
		<div class="container-fluid">
			<div class="text-center"><h1>Exluir Perfil</h1></div>
		</div>

		<?php
			include_once('conexao.php');		
			/*
			ORIGINAL COMENTADO!!!!
			// recuperando 
			$codigo = $_POST['codigo'];

			// criando a linha do  SELECT
			$sqlconsulta =  "select * from tabelaimg where codigo = $codigo";
			
			*/
			// Acrescentado
			//função remodelada para de fato formatar data/hora
			function convertedata($data){
				date_default_timezone_set("America/Sao_Paulo");
				$datanova = date_create($data);
				return date_format($datanova, "Y-m-d");
			}
			
			include("conexao.php");
			$no="no";
			// recuperando a informação da URL
			// verifica se parâmetro está correto e dento da normalidade 
			if(isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))){
				$id = base64_decode($_GET['id']);
			} else {
				header('Location: index.php');
			}
			// criando a linha do  SELECT
			$sqlconsulta =  "select * from tabelaimg where id = $id";
			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sqlconsulta);
			if (!$resultado) {
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
			} else {
				$num = @mysqli_num_rows($resultado);
				if ($num==0){
				echo "<b>Código: </b>não localizado !!!!<br><br>";
				echo '<input type="button" onclick="window.location='."'exclusao.php'".';" value="Voltar"><br><br>';
				exit;		
				}else{
					$dados=mysqli_fetch_array($resultado);
				}
			}
			mysqli_close($conexao);
			 
			$imagem = "SemImagem.png";
			if(!empty($dados['imagem'])){
				$imagem = $dados['imagem'];
			}
			if (empty($dados['foto'])){
				$foto = 'SemImagem.png';
			} else {
				$foto = $dados['foto'];
			}
		?>
		<div class="container">

			<form>
				<div class="mb-3">
					<label for="id" class="form-label"><b>Id:</b></label>
					<input type="text" class="form-control bg-dark text-white" disabled name="id" disabled value="<?php echo $dados['id']; ?>" readonly>
				</div>
				<div class="mb-3">
					<label for="codigo" class="form-label"><b>Nome:</b></label>
					<input type="text" class="form-control bg-dark text-white" disabled name="codigo" disabled value="<?php echo $dados['codigo']; ?>" readonly>
				</div>
				
				<div class="mb-3">
					<label for="produto" class="form-label"><b>Endereço:</b></label>
					<input type="text" class="form-control bg-dark text-white" name="produto" disabled value="<?php echo $dados['produto']; ?>">
				</div>

				<div class="mb-3">
					<label for="departamento" class="form-label"><b>Departamento:</b></label>
					<input type="text" class="form-control bg-dark text-white" name="departamento" disabled value="<?php echo $dados['descricao']; ?>">
				</div>
				
				<div class="mb-3">
					<label for="data" class="form-label"><b>Data de Nascimento:</b></label>
					<input type="date" name="data" class="form-control bg-dark text-white" disabled value="<?php echo convertedata($dados['data']); ?>">
				</div>

			</form>

			
				<div class="btn-group" role="group">
					<form name="produto" action="excluir.php" method="post" class="botoes">
						<input type='hidden' name='id' value="<?php echo $id; ?>">
						<input type='submit' value='Apagar' class="btn btn-outline-danger">&nbsp;&nbsp;
						<input type='button' onclick="window.location='index.php';" value="Voltar" class="btn btn-secondary"> <!-- Alterado -->
					</form>
				</div>
		
				
			<div Class="perfil">
				<img src="imagens/<?php echo $imagem; ?>" class="atual" name="foto" width="100px"><br><br>
			</div>
		</div>
	</body>
</html>
