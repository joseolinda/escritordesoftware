
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
					

include 'forms/forminserircategoria.php';
				
				
$categoria = new CategoriaDAO();
$result = $categoria->retornaLista();
foreach($result as $linha)
{
	echo ' categoria';
 
echo $linha['id'].'<br>';
 
echo $linha['nome'].'<br>';

}				
				
?>
				
				