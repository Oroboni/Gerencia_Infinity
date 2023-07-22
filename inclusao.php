<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<title> Gerencia - infinity </title>

		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="javascript/bootstrap.min.js"></script>
		<script src="javascript/pesquisa.js"></script>
		
		<style>
			.right {
				left:80%;
				position: relative;
				width: 20%;
				height: 10%;

			}

			

			.body{
				height:100%;
				width: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				background-color: #5E6183;
			}

			.container{
				align-items: center;
				width: 80%;
				height: 80%;
				
				/* background-color: #5E6183; */
				box-shadow: 5px 5px 10px rgba(1, 1, 1, 1);
				display: flex;
			}

			.img_fundo{
				width: 50%;
				display: flex;
				justify-content: left;
				padding: 1rem	;
			}

			.vizualizador{
				align-items:flex-end ;
				width: 80%;
				height: 80%;
				display: flex;
			}
			
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="text-center"><h1>Cadastrar Gerente</h1></div>
		</div>

		<!-- Formulario para preenchimento de novo gerente -->
		<div class="container">	
			<div class="img_fundo">
				<form name="produto" action="incluir.php" method="post" enctype="multipart/form-data"> <!-- ALTERADO -->
					<b>Nome:</b> <input type="text" class="form-control bg-dark text-white"name="codigo" maxlength='250' required="required"><br><br>
					<b>Endereço:</b> <input type="text" class="form-control bg-dark text-white"name="produto" maxlength='250' ><br><br>
					<b>Departamento: </b><br><input class="form-control bg-dark text-white"name="descricao" maxlength='80' rows='3' cols='100' style="resize: none;"><br><br>
					<b>Data de Nascimento: </b> <input type="date" class="form-control bg-dark text-white"name="data"><br><br>
					<b>Foto: </b><input type="file" class="form-control bg-dark text-white"name="imagem" maxlength='50'> <br><br> <!-- INCLUIDO // ATENÇÃO-->
					
					<!-- Botões "Ok","Limpar" e "Voltar" -->
					<div class="btn-group" role="group">
						<input type="submit" value="Ok"class="btn btn-secondary">
						<input type="reset" value="Limpar"class="btn btn-secondary">
						<input type='button' onclick="window.location='index.php';" value="Voltar" class="btn btn-secondary">
					</div>
				</form>
			</div>
			
			<!-- Imagem de fundo -->
			<div class="vizualizador">
				<img src="./imagens/undraw_counting_stars_re_smvv.svg" alt="">
			</div>
		</div>
		
		

	</body>
</html>
