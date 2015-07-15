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
				

$blog = new Blog();

	if($_POST["titulo"] != null)
	{
		$blog->setTitulo($_POST["titulo"]);
	}
			
				
	if($_POST["corpo"] != null)
	{
		$blog->setCorpo($_POST["corpo"]);
	}
			
				
$blogdao= new BlogDAO();
$blogdao->inserir($blog);?>