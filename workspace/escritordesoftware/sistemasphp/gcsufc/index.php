<?php
//Funcao que inclui classe automaticamente no momento em que for instanciada. 
function __autoload($classe){


	if(file_exists("class/especificas/{$classe}.class.php"))
	{
		include_once "class/especificas/{$classe}.class.php";

	}elseif (file_exists("class/appado/{$classe}.class.php"))
	{
		include_once "class/appado/{$classe}.class.php";

	}


}
?>
<!DOCTYPE html>
<html>
  	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>gcsufc</title>
	</head>
  	<body>
		<div id="topo">
			<h1>gcsufc</h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="">Ítem do Menu</a></li>
				<li><a href="">Outro Ítem do Menu</a></li>
			</ul>
		</div>
		<div id="corpo">
			<div id="esquerda">Esta é a esquerda</div>
					
			<div id="direita">Esta é a direita</div>		
			
		</div>
		<div id="footer">
			<p>Base do site</p>
		</div>
					
		
	</body>
</html>