
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
					
					
					if($_POST["tipo"] != null)
					{
							$software->setTipo($_POST["tipo"]);
					}
					
					
					if($_POST["indice"] != null)
					{
							$software->setIndice($_POST["indice"]);
					}
					
					
					if($_POST["auto_increment"] != null)
					{
							$software->setAuto_increment($_POST["auto_increment"]);
					}
					
					
		$softwaredao = new  SoftwareDAO();
		$softwaredao->inserir($software);
				
		?>