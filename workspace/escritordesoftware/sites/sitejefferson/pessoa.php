
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
					

include 'forms/forminserirpessoa.php';
				
				
$pessoa = new PessoaDAO();
$result = $pessoa->retornaLista();
foreach($result as $linha)
{
	echo ' pessoa';
 
echo $linha['id'].'<br>';
 
echo $linha['nome'].'<br>';
 
echo $linha['telefone'].'<br>';

}				
				
?>
				
				