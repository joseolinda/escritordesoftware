
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
					

include 'forms/forminserirendereco.php';
				
				
$endereco = new EnderecoDAO();
$result = $endereco->retornaLista();
foreach($result as $linha)
{
	echo ' endereco';
 
echo $linha['id'].'<br>';
 
echo $linha['rua'].'<br>';
 
echo $linha['numero'].'<br>';
 
echo $linha['bairro'].'<br>';

}				
				
?>
				
				