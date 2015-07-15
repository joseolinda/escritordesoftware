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
				

$software = new Software();

	if($_POST["nome"] != null)
	{
		$software->setNome($_POST["nome"]);
	}
			
				
	if($_POST["objetos"] != null)
	{
		$software->setObjetos($_POST["objetos"]);
	}
			
				
$softwaredao= new SoftwareDAO();
$softwaredao->inserir($software);?>