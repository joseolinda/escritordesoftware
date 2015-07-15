
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


$atributo = new Atributo();



if($_POST["id"] != null)
{
	$atributo->setId($_POST["id"]);
}
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
	
	
$atributo->setId_objeto($_POST["id_objeto"]);
	
	
$atributodao = new  AtributoDAO();
$atributodao->inserir($atributo);

?>