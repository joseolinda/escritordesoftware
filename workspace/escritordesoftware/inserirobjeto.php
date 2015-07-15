
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


$objeto = new Objeto();


if($_POST["id_objeto"] != null)
{
	$objeto->setId($_POST["id_objeto"]);
}
	
	
if($_POST["nome"] != null)
{
	$objeto->setNome($_POST["nome"]);
}
	
	
if($_POST["id_software"] != null)
{
	$objeto->setIdSoftware($_POST['id_software']);
	
}
if($_POST['persistencia'] != null)
{
	$objeto->setPersistencia($_POST['persistencia']);
	
}
	
		
	
$objetodao = new  ObjetoDAO();
$objetodao->inserir($objeto);

?>