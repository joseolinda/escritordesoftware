
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
				
				
		$software = new Software();
				
						
				
					if($_POST["id"] != null)
					{
							$software->setId($_POST["id"]);
					}
					
					
					if($_POST["nome"] != null)
					{
							$software->setNome($_POST["nome"]);
					}
					
					
					if($_POST["software"] != null)
					{
							$software->setSoftware($_POST["software"]);
					}
					
					
					if($_POST["banco_de_dados"] != null)
					{
							$software->setBanco_de_dados($_POST["banco_de_dados"]);
					}
					
					
		$softwaredao = new  SoftwareDAO();
		$softwaredao->inserir($software);
				
		?>