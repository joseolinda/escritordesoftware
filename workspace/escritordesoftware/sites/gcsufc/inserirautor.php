
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
				
				
		$autor = new Autor();
				
						
				
					if($_POST["id"] != null)
					{
							$autor->setId($_POST["id"]);
					}
					
					
					if($_POST["nome"] != null)
					{
							$autor->setNome($_POST["nome"]);
					}
					
					
					if($_POST["nome_completo"] != null)
					{
							$autor->setNome_completo($_POST["nome_completo"]);
					}
					
					
					if($_POST["ultimo_nome"] != null)
					{
							$autor->setUltimo_nome($_POST["ultimo_nome"]);
					}
					
					
		$autordao = new  AutorDAO();
		$autordao->inserir($autor);
				
		?>