
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
				
				
		$blog = new Blog();
				
						
				
					if($_POST["id"] != null)
					{
							$blog->setId($_POST["id"]);
					}
					
					
					if($_POST["titulo"] != null)
					{
							$blog->setTitulo($_POST["titulo"]);
					}
					
					
					if($_POST["corpo"] != null)
					{
							$blog->setCorpo($_POST["corpo"]);
					}
					
					
					if($_POST["data"] != null)
					{
							$blog->setData($_POST["data"]);
					}
					
					
					if($_POST["hora"] != null)
					{
							$blog->setHora($_POST["hora"]);
					}
					
					
		$blogdao = new  BlogDAO();
		$blogdao->inserir($blog);
				
		?>