
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
Conexao::geraBancoDeDados();

?>
<!DOCTYPE html>
<html>
	<body>
		<h1>Teste Iremos mostrar os dados recolhidos</h1>

		<p>Nome do site: agenda.</p>
	</body>
</html>