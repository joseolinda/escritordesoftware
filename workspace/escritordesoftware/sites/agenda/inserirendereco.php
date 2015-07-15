
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
				
				
		$endereco = new Endereco();
				
						
				
					if($_POST["id"] != null)
					{
							$endereco->setId($_POST["id"]);
					}
					
					
					if($_POST["rua"] != null)
					{
							$endereco->setRua($_POST["rua"]);
					}
					
					
					if($_POST["numero"] != null)
					{
							$endereco->setNumero($_POST["numero"]);
					}
					
					
					if($_POST["bairro"] != null)
					{
							$endereco->setBairro($_POST["bairro"]);
					}
					
					
		$enderecodao = new  EnderecoDAO();
		$enderecodao->inserir($endereco);
				
		?>