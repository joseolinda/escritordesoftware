
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
				
						
				
					if($_POST["id"] != null)
					{
							$objeto->setId($_POST["id"]);
					}
					
					
					if($_POST["nome"] != null)
					{
							$objeto->setNome($_POST["nome"]);
					}
					
					
					if($_POST["software"] != null)
					{
							$objeto->setSoftware($_POST["software"]);
					}
					
					
					if($_POST["banco_de_dados"] != null)
					{
							$objeto->setBanco_de_dados($_POST["banco_de_dados"]);
					}
					
					
		$objetodao = new  ObjetoDAO();
		$objetodao->inserir($objeto);
				
		?>