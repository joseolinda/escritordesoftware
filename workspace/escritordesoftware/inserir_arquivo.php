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
				

$arquivo = new Arquivo();

	if($_POST["caminho"] != null)
	{
		$arquivo->setCaminho($_POST["caminho"]);
	}
			
				
	if($_POST["nome"] != null)
	{
		$arquivo->setNome($_POST["nome"]);
	}
			
				
	if($_POST["conteudo"] != null)
	{
		$arquivo->setConteudo($_POST["conteudo"]);
	}
			
				
$arquivodao= new ArquivoDAO();
$arquivodao->inserir($arquivo);?>