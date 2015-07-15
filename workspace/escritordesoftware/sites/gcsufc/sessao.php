
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
					

include 'forms/forminserirsessao.php';
				
				
$sessao = new SessaoDAO();
$result = $sessao->retornaLista();
foreach($result as $linha)
{
	echo ' sessao';

}				
				
?>
				
				