
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
					

include 'forms/forminserirusuario.php';
				
				
$usuario = new UsuarioDAO();
$result = $usuario->retornaLista();
foreach($result as $linha)
{
	echo ' usuario';
 
echo $linha['id'].'<br>';
 
echo $linha['nome'].'<br>';
 
echo $linha['login'].'<br>';
 
echo $linha['email'].'<br>';
 
echo $linha['senha'].'<br>';
 
echo $linha['nivel'].'<br>';
 
echo $linha['data'].'<br>';

}				
				
?>
				
				