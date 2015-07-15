
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
					
					
					if($_POST["idade"] != null)
					{
							$pessoa->setIdade($_POST["idade"]);
					}
					
					
		$pessoadao = new  PessoaDAO();
		$pessoadao->inserir($pessoa);
				
		?>