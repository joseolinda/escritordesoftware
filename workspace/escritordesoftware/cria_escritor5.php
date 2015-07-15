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




$array_de_atributos = array(new Atributo('id'), new Atributo('nome'), new Atributo('software'), new Atributo('banco_de_dados'));


$objeto[0] = new Objeto('site', $array_de_atributos);

$array_de_atributos = array(new Atributo('id'), new Atributo('nome'), new Atributo('software'), new Atributo('banco_de_dados'));

$objeto[1] = new Objeto('software', $array_de_atributos);

$array_de_atributos = array(new Atributo('id'), new Atributo('nome'), new Atributo('software'), new Atributo('banco_de_dados', 'objeto'));

$objeto[2] = new Objeto('banco_de_dados', $array_de_atributos);

$array_de_atributos = array(new Atributo('id'), new Atributo('nome'), new Atributo('software'), new Atributo('banco_de_dados'));

$objeto[3] = new Objeto('objeto', $array_de_atributos);

$array_de_atributos = array(new Atributo('id'), new Atributo('nome'), new Atributo('software'), new Atributo('banco_de_dados'));

$objeto[4] = new Objeto('atributo', $array_de_atributos);


$software[0] = new Software('escritordesoftware', $objeto);

$banco_de_dados = new Banco_de_dados();
$banco_de_dados->setNome('escritordesoftware');


$site = new Site('escritordesoftware', $software, $banco_de_dados);


$escritor = new Escritor();
$escritor->setSite($site);
$escritor->geraSite();

/*

$atributo = new Atributo();
$atributo->setNome('id');

$atributo2 = new Atributo();
$atributo2->setNome('software');
$atributo2->setTipo('objeto');


$atributo3 = new Atributo();
$atributo3->setNome('banco_de_dados');
$atributo3->setTipo('objeto');

$array_de_atributos = array($atributo, $atributo2, $atributo3);

$nome_do_objeto = 'site';



$objeto = new Objeto($nome_do_objeto, $array_de_atributos);

$nome_do_objeto = 'banco_de_dados';

$atributo = new Atributo();
$atributo->setNome('id');

$atributo2 = new Atributo();
$atributo2->setNome('nome');

$atributo3 = new Atributo();
$atributo3->setNome('senha');


$atributo4 = new Atributo();
$atributo4->setNome('port');

$atributo5 = new Atributo();
$atributo5->setNome('usuario');

$atributo6 = new Atributo();
$atributo6->setNome('host');


$atributo7 = new Atributo();
$atributo7->setNome('tipo');


$array_de_atributos = array($atributo, $atributo2, $atributo3, $atributo4, $atributo5, $atributo6, $atributo7);

$objeto2 = new Objeto($nome_do_objeto, $array_de_atributos);




$nome_do_objeto = 'software';

$atributo = new Atributo();
$atributo->setNome('id');

$atributo2 = new Atributo();
$atributo2->setNome('nome');

$atributo3 = new Atributo();
$atributo3->setNome('tipo');

$atributo4 = new Atributo();
$atributo4->setNome('indice');

$atributo5 = new Atributo();
$atributo5->setNome('auto_increment');

$array_de_atributos = array($atributo, $atributo2, $atributo3, $atributo4, $atributo5);




$objeto3 = new Objeto($nome_do_objeto, $array_de_atributos);



$nome_do_software = 'escritordesoftware5';









$array_de_objetos = array($objeto, $objeto2, $objeto3);

$software = new Software($nome_do_software, $array_de_objetos);
$arrayDeSoftwares = array($software);
$banco_de_dados = new Banco_de_dados();

$nome_do_site = 'escritordesoftware5';

$site = new Site($nome_do_site, $arrayDeSoftwares, $banco_de_dados);






 
$escritor = new Escritor();
$escritor->setSite($site);
$escritor->geraSite();



*/
?>
