
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
					
					
					if($_POST["software"] != null)
					{
							$atributo->setSoftware($_POST["software"]);
					}
					
					
					if($_POST["banco_de_dados"] != null)
					{
							$atributo->setBanco_de_dados($_POST["banco_de_dados"]);
					}
					
					
		$atributodao = new  AtributoDAO();
		$atributodao->inserir($atributo);
				
		?>