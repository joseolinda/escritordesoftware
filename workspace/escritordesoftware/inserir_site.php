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
				

$site = new Site();

	if($_POST["software"] != null)
	{
		$site->setSoftware($_POST["software"]);
	}
			
				
	if($_POST["banco_de_dados"] != null)
	{
		$site->setBanco_de_dados($_POST["banco_de_dados"]);
	}
			
				
	if($_POST["paginas"] != null)
	{
		$site->setPaginas($_POST["paginas"]);
	}
			
				
$sitedao= new SiteDAO();
$sitedao->inserir($site);?>