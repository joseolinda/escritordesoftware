
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
				
				
		$usuario = new Usuario();
				
						
				
					if($_POST["id"] != null)
					{
							$usuario->setId($_POST["id"]);
					}
					
					
					if($_POST["nome"] != null)
					{
							$usuario->setNome($_POST["nome"]);
					}
					
					
					if($_POST["login"] != null)
					{
							$usuario->setLogin($_POST["login"]);
					}
					
					
					if($_POST["email"] != null)
					{
							$usuario->setEmail($_POST["email"]);
					}
					
					
					if($_POST["senha"] != null)
					{
							$usuario->setSenha($_POST["senha"]);
					}
					
					
					if($_POST["nivel"] != null)
					{
							$usuario->setNivel($_POST["nivel"]);
					}
					
					
					if($_POST["data"] != null)
					{
							$usuario->setData($_POST["data"]);
					}
					
					
		$usuariodao = new  UsuarioDAO();
		$usuariodao->inserir($usuario);
				
		?>