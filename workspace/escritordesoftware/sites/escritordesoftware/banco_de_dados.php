
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
					

include 'forms/forminserirbanco_de_dados.php';
				
				
$banco_de_dados = new Banco_de_dadosDAO();
$result = $banco_de_dados->retornaLista();
foreach($result as $linha)
{
	echo ' banco_de_dados';
 
echo $linha['id'].'<br>';
 
echo $linha['nome'].'<br>';
 
echo $linha['software'].'<br>';

}				
				
?>
				
				