
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
				
				
		$pessoa = new Pessoa();
				
						
				
					if($_POST["id"] != null)
					{
							$pessoa->setId($_POST["id"]);
					}
					
					
					if($_POST["nome"] != null)
					{
							$pessoa->setNome($_POST["nome"]);
					}
					
					
					if($_POST["telefone"] != null)
					{
							$pessoa->setTelefone($_POST["telefone"]);
					}
					
					
		$pessoadao = new  PessoaDAO();
		$pessoadao->inserir($pessoa);
				
		?>