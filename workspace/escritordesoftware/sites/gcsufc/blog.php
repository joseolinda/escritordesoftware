
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
					

include 'forms/forminserirblog.php';
				
				
$blog = new BlogDAO();
$result = $blog->retornaLista();
foreach($result as $linha)
{
	echo ' blog';
 
echo $linha['id'].'<br>';
 
echo $linha['titulo'].'<br>';
 
echo $linha['corpo'].'<br>';
 
echo $linha['data'].'<br>';
 
echo $linha['hora'].'<br>';

}				
				
?>
				
				