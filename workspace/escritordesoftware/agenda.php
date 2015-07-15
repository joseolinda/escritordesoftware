<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>



<?php
//uma agenda que servira para testar meu software de gerador de software


function __autoload($classe){


	if(file_exists("class/especificas/{$classe}.class.php"))
	{
		include_once "class/especificas/{$classe}.class.php";

	}elseif (file_exists("class/appado/{$classe}.class.php"))
	{
		include_once "class/appado/{$classe}.class.php";

	}


}



$instanciador1 = new Instanciador_rapido();
$instanciador1->setNome_do_site('agenda');
$instanciador1->setPersistencia(true);
$instanciador1->setNome_do_objeto('pessoa');
$instanciador1->setNome_do_banco_de_dados('agenda');
$instanciador1->setString_de_atributos('id, nome, idade');
$instanciador1->setString_de_tipos('int, text, int');



$instanciador2 = new Instanciador_rapido();
$instanciador2->setNome_do_site('agenda');
$instanciador2->setNome_do_objeto('endereco');
$instanciador2->setNome_do_banco_de_dados('agenda');
$instanciador2->setString_de_atributos('id, rua, numero, bairro');
$instanciador2->setString_de_tipos('int, text, text, text');

$instanciadores = array($instanciador1, $instanciador2);
Instanciador_rapido::instanciaObjetos($instanciadores);



?>
</body>
</html>