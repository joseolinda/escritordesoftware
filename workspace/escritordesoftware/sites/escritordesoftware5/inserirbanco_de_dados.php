
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
					
					
					if($_POST["senha"] != null)
					{
							$banco_de_dados->setSenha($_POST["senha"]);
					}
					
					
					if($_POST["port"] != null)
					{
							$banco_de_dados->setPort($_POST["port"]);
					}
					
					
					if($_POST["usuario"] != null)
					{
							$banco_de_dados->setUsuario($_POST["usuario"]);
					}
					
					
					if($_POST["host"] != null)
					{
							$banco_de_dados->setHost($_POST["host"]);
					}
					
					
					if($_POST["tipo"] != null)
					{
							$banco_de_dados->setTipo($_POST["tipo"]);
					}
					
					
		$banco_de_dadosdao = new  Banco_de_dadosDAO();
		$banco_de_dadosdao->inserir($banco_de_dados);
				
		?>