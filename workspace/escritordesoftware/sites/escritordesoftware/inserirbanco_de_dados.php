
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
				
				
		$banco_de_dados = new Banco_de_dados();
				
						
				
					if($_POST["id"] != null)
					{
							$banco_de_dados->setId($_POST["id"]);
					}
					
					
					if($_POST["nome"] != null)
					{
							$banco_de_dados->setNome($_POST["nome"]);
					}
					
					
					if($_POST["software"] != null)
					{
							$banco_de_dados->setSoftware($_POST["software"]);
					}
					
					
		$banco_de_dadosdao = new  Banco_de_dadosDAO();
		$banco_de_dadosdao->inserir($banco_de_dados);
				
		?>