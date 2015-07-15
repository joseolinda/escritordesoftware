
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
				
				
		$site = new Site();
				
						
				
					if($_POST["id"] != null)
					{
							$site->setId($_POST["id"]);
					}
					
					
					if($_POST["nome"] != null)
					{
							$site->setNome($_POST["nome"]);
					}
					
					
					if($_POST["software"] != null)
					{
							$site->setSoftware($_POST["software"]);
					}
					
					
					if($_POST["banco_de_dados"] != null)
					{
							$site->setBanco_de_dados($_POST["banco_de_dados"]);
					}
					
					
		$sitedao = new  SiteDAO();
		$sitedao->inserir($site);
				
		?>