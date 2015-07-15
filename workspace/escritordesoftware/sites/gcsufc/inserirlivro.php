
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
				
				
		$livro = new Livro();
				
						
				
					if($_POST["id"] != null)
					{
							$livro->setId($_POST["id"]);
					}
					
					
					if($_POST["referencia"] != null)
					{
							$livro->setReferencia($_POST["referencia"]);
					}
					
					
					if($_POST["titulo"] != null)
					{
							$livro->setTitulo($_POST["titulo"]);
					}
					
					
					if($_POST["descricao"] != null)
					{
							$livro->setDescricao($_POST["descricao"]);
					}
					
					
					if($_POST["caminho_foto"] != null)
					{
							$livro->setCaminho_foto($_POST["caminho_foto"]);
					}
					
					
					if($_POST["link_de_download"] != null)
					{
							$livro->setLink_de_download($_POST["link_de_download"]);
					}
					
					
		$livrodao = new  LivroDAO();
		$livrodao->inserir($livro);
				
		?>