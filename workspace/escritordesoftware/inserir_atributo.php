<?php
				

function __autoload($classe){


	if(file_exists("class/especificas/{$classe}.class.php"))
	{
		include_once "class/especificas/{$classe}.class.php";

	}elseif (file_exists("class/app.ado/{$classe}.class.php"))
	{
		include_once "class/app.ado/{$classe}.class.php";

	}


}
				

$atributo = new Atributo();

	if($_POST["nome"] != null)
	{
		$atributo->setNome($_POST["nome"]);
	}
			
				
	if($_POST["tipo"] != null)
	{
		$atributo->setTipo($_POST["tipo"]);
	}
			
				
	if($_POST["tamanho"] != null)
	{
		$atributo->setTamanho($_POST["tamanho"]);
	}
			
				
	if($_POST["indice"] != null)
	{
		$atributo->setIndice($_POST["indice"]);
	}
			
				
	if($_POST["auto_increment"] != null)
	{
		$atributo->setAuto_increment($_POST["auto_increment"]);
	}
			
				
$atributodao= new AtributoDAO();
$atributodao->inserir($atributo);?>