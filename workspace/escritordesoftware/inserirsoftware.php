
<?php


function __autoload($classe){


	if(file_exists("class/especificas/{$classe}.class.php"))
	{
		include_once "class/especificas/{$classe}.class.php";

	}elseif (file_exists("class/appado/{$classe}.class.php"))
	{
		include_once "class/appado/{$classe}.class.php";

	}


}


$software = new Software();



if($_POST["nome"] != null)
{
	$software->setNome($_POST["nome"]);
	
	$softwaredao = new  SoftwareDAO();
	$softwaredao->inserir($software);
	
	
}
	
	
?>