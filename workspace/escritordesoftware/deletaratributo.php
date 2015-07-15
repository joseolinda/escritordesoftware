<?php
session_start();
 
function __autoload($classe) {
	if (file_exists ( "class/especificas/{$classe}.class.php" )) {
		include_once "class/especificas/{$classe}.class.php";
	} elseif (file_exists ( "class/appado/{$classe}.class.php" )) {
		include_once "class/appado/{$classe}.class.php";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Escritor De Software</title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>


<?php

if($_GET['id_atributo']){
	
	//iremos deletar um atributo aqui. 
	$atributo = new Atributo(); 
	$atributo->setId($_GET['id_atributo']);
	$atributodao = new AtributoDAO();
	$atributodao->setConexao(Conexao::retornaConexaoComBanco());
	if($atributodao->deletarAtributo($atributo)){
		
		echo 'Atributo deletado com sucesso<META HTTP-EQUIV="REFRESH" CONTENT="5; URL=software.php">
				<a href="javascript:window.history.go(-1)">Voltar</a>';
	}else{
		echo 'Falha.
				<a href="javascript:window.history.go(-1)">Voltar</a>';
		
	}
	
	
	
	
}


?>
</body>

</html>