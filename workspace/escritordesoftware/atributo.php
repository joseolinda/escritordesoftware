
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
					

include 'forms/forminseriratributo.php';
				
				
$atributo = new AtributoDAO();
$result = $atributo->retornaLista();
foreach($result as $linha)
{
	echo ' atributo';
 
echo $linha['id'].'<br>';
 
echo $linha['nome'].'<br>';
 
echo $linha['software'].'<br>';
 
echo $linha['banco_de_dados'].'<br>';

}				
				
?>
				
				