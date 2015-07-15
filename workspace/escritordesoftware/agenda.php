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



$atributo = new Atributo();
$atributo->setNome('id');

$atributo2 = new Atributo();
$atributo2->setNome('nome');

$atributo3 = new Atributo();
$atributo3->setNome('telefone');



$nome_do_objeto = 'pessoa';

$array_de_atributos = array($atributo, $atributo2, $atributo3);
$objeto = new Objeto($nome_do_objeto, $array_de_atributos);
$nome_do_software = 'agenda';
$array_de_objetos = array($objeto);
$software = new Software($nome_do_software, $array_de_objetos);
$arrayDeSoftwares = array($software);
$banco_de_dados = new Banco_de_dados();
$nome_do_site = 'sitejefferson';
$site = new Site($nome_do_site, $arrayDeSoftwares, $banco_de_dados);

$sitedao = new SiteDAO();

$sitedao->inserir($site);





/*
 * gerar o site
 * 
$escritor = new Escritor();
$escritor->setSite($site);
$escritor->geraSite();
*/



?>
