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
				

$banco_de_dados = new Banco_de_dados();

	if($_POST["nome"] != null)
	{
		$banco_de_dados->setNome($_POST["nome"]);
	}
			
				
	if($_POST["host"] != null)
	{
		$banco_de_dados->setHost($_POST["host"]);
	}
			
				
	if($_POST["senha"] != null)
	{
		$banco_de_dados->setSenha($_POST["senha"]);
	}
			
				
	if($_POST["tipo"] != null)
	{
		$banco_de_dados->setTipo($_POST["tipo"]);
	}
			
				
$banco_de_dadosdao= new Banco_de_dadosDAO();
$banco_de_dadosdao->inserir($banco_de_dados);?>