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
				

$objeto = new Objeto();

	if($_POST["atributos"] != null)
	{
		$objeto->setAtributos($_POST["atributos"]);
	}
			
				
	if($_POST["persistencia"] != null)
	{
		$objeto->setPersistencia($_POST["persistencia"]);
	}
			
				
	if($_POST["documentacao"] != null)
	{
		$objeto->setDocumentacao($_POST["documentacao"]);
	}
			
				
$objetodao= new ObjetoDAO();
$objetodao->inserir($objeto);?>