
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
				
				
		$categoria = new Categoria();
				
						
				
					if($_POST["id"] != null)
					{
							$categoria->setId($_POST["id"]);
					}
					
					
					if($_POST["nome"] != null)
					{
							$categoria->setNome($_POST["nome"]);
					}
					
					
		$categoriadao = new  CategoriaDAO();
		$categoriadao->inserir($categoria);
				
		?>