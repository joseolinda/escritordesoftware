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
				

$pagina = new Pagina();

	if($_POST["nome"] != null)
	{
		$pagina->setNome($_POST["nome"]);
	}
			
				
	if($_POST["objeto"] != null)
	{
		$pagina->setObjeto($_POST["objeto"]);
	}
			
				
	if($_POST["atividade"] != null)
	{
		$pagina->setAtividade($_POST["atividade"]);
	}
			
				
	if($_POST["conteudo_anterior"] != null)
	{
		$pagina->setConteudo_anterior($_POST["conteudo_anterior"]);
	}
			
				
	if($_POST["conteudo_posterior"] != null)
	{
		$pagina->setConteudo_posterior($_POST["conteudo_posterior"]);
	}
			
				
$paginadao= new PaginaDAO();
$paginadao->inserir($pagina);?>