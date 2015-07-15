
<?php
			function __autoload($classe)
{
	if(file_exists("class/especificas/{$classe}.class.php"))
	{
		include_once "class/especificas/{$classe}.class.php";

	}
	elseif (file_exists("class/appado/{$classe}.class.php"))
	{
		include_once "class/appado/{$classe}.class.php";

	}


}
					

include 'forms/forminserirlivro.php';
				
				
$livro = new LivroDAO();
$result = $livro->retornaLista();
foreach($result as $linha)
{
	echo ' livro';
 
echo $linha['id'].'<br>';
 
echo $linha['referencia'].'<br>';
 
echo $linha['titulo'].'<br>';
 
echo $linha['descricao'].'<br>';
 
echo $linha['caminho_foto'].'<br>';
 
echo $linha['link_de_download'].'<br>';

}				
				
?>
				
				