
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
					

include 'forms/forminserirautor.php';
				
				
$autor = new AutorDAO();
$result = $autor->retornaLista();
foreach($result as $linha)
{
	echo ' autor';
 
echo $linha['id'].'<br>';
 
echo $linha['nome'].'<br>';
 
echo $linha['nome_completo'].'<br>';
 
echo $linha['ultimo_nome'].'<br>';

}				
				
?>
				
				