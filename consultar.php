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

<body class="text-light">
	<header>
		<div class="container-fluid">
			<nav class="navbar navbar-expand-sm">
				<img src="./icons/Infinity_ico_copiar.jpg" width="170" height="60" class="d-inline-block align-top" alt="">
				<a class="btn btn-secondary" href="index.php">Home</a>&nbsp;&nbsp;&nbsp;
				<a class="btn btn-secondary" href="inclusao.php">Novo Funcionario</a><br>
				<form action="index.php" method="post">

				</form>
			</nav>
		</div>
	</header>
	<br><br>
<h3>Gerencia - infinity - Consulta</h3>
<?php
	include_once('conexao.php');
	// recuperando 
	$id = $_POST['id'];

	// criando a linha do  SELECT
	$sqlconsulta =  "select * from tabelaimg where id = $id";
	
	// executando instru��o SQL
	$resultado = @mysqli_query($conexao, $sqlconsulta);
	if (!$resultado) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Inv�lida:</b>' . @mysqli_error($conexao)); 
	} else {
		$num = @mysqli_num_rows($resultado);
		if ($num==0){
		echo "<b>C�digo: </b>n�o localizado !!!!<br><br>";
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		exit;		
		}else{
			$dados=mysqli_fetch_array($resultado);
		}
	} 
	mysqli_close($conexao);
?>
<b>C�digo:</b> <input type="number"  value="<?php echo $dados['codigo']; ?>" readonly required="required"><br><br>
<b>Produto:</b> <input type="text"  maxlength='80' style="width:550px" value="<?php echo $dados['produto']; ?>" readonly ><br><br>
<b>Descri��o: </b><br><textarea  rows='3' cols='100' style="resize: none;" readonly ><?php echo $dados['descricao']; ?></textarea><br><br>
<b>Data: </b> <input type="date" value="<?php echo $dados['data']; ?>" readonly ><br><br>
<b>Valor: R$ </b><input type="number" step="0.01" name="valor" value="<?php echo $dados['valor']; ?>" readonly > <br><br>
<input type='button' onclick="window.location='index.php';" value="Voltar">
</body>
</html>
