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
				

$metodo = new Metodo();

	if($_POST["assinatura"] != null)
	{
		$metodo->setAssinatura($_POST["assinatura"]);
	}
			
				
	if($_POST["documentacao"] != null)
	{
		$metodo->setDocumentacao($_POST["documentacao"]);
	}
			
				
$metododao= new MetodoDAO();
$metododao->inserir($metodo);?>