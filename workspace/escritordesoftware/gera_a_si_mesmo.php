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
$instanciador1->setNome_do_site('escritor');
$instanciador1->setPersistencia(true);
$instanciador1->setNome_do_objeto('site');
$instanciador1->setNome_do_banco_de_dados('escritor');
$instanciador1->setString_de_atributos('id, nome, software, banco_de_dados');
$instanciador1->setString_de_tipos('int, text, objeto, objeto');



$instanciador2 = new Instanciador_rapido();
$instanciador2->setNome_do_site('escritor');
$instanciador2->setNome_do_objeto('software');
$instanciador2->setNome_do_banco_de_dados('escritor');
$instanciador2->setString_de_atributos('id, rua, numero, bairro');
$instanciador2->setString_de_tipos('int, text, text, text');

$instanciadores = array($instanciador1, $instanciador2);
Instanciador_rapido::instanciaObjetos($instanciadores);



?>
