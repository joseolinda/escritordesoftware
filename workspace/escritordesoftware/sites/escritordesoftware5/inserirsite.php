
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
					
					
		$sitedao = new  SiteDAO();
		$sitedao->inserir($site);
				
		?>