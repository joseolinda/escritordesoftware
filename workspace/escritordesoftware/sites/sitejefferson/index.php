
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
?>
<!DOCTYPE html>
<html>
	<body>
		<h1>Teste Iremos mostrar os dados recolhidos</h1>

		<p>Nome do site: sitejefferson.</p>
	</body>
</html>