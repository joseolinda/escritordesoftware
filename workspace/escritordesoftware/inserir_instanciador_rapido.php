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
				

$instanciador_rapido = new Instanciador_rapido();

	if($_POST["nome_do_software"] != null)
	{
		$instanciador_rapido->setNome_do_software($_POST["nome_do_software"]);
	}
			
				
	if($_POST["nome_do_objeto"] != null)
	{
		$instanciador_rapido->setNome_do_objeto($_POST["nome_do_objeto"]);
	}
			
				
	if($_POST["string_de_atributos"] != null)
	{
		$instanciador_rapido->setString_de_atributos($_POST["string_de_atributos"]);
	}
			
				
	if($_POST["string_de_tipos"] != null)
	{
		$instanciador_rapido->setString_de_tipos($_POST["string_de_tipos"]);
	}
			
				
$instanciador_rapidodao= new Instanciador_rapidoDAO();
$instanciador_rapidodao->inserir($instanciador_rapido);?>