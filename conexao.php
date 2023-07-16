<?php
	
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	
	$host = "localhost"; 			
	$user = "root"; 
	$pass = ""; 
	$banco = "banco";
		
	$conexao = @mysqli_connect($host, $user, $pass, $banco) 
	or die ("Problemas com a conexão do Banco de Dados");
	mysqli_set_charset($conexao, "utf8");
?>
