<?php

function __autoload($classe){


	if(file_exists("class/especificas/{$classe}.class.php"))
	{
		include_once "class/especificas/{$classe}.class.php";

	}


}


$software = new Software();
$software->setNome('escritor_de_software3');
$tabela = new Tabela();
$tabela->setNome('site');
$tabela->setAtributos('
software,
banco_de_dados, 
paginas');
$tabela->setSeparador(',');


$softwareTb = new Tabela();
$softwareTb->setNome('software');
$softwareTb->setAtributos('nome, objetos');
$softwareTb->setSeparador(',');


$objeto = new Tabela();
$objeto->setNome('copiador');
$objeto->setAtributos('caminho_inicial, caminho_final');
$objeto->setSeparador(',');

$atributo = new Tabela();
$atributo->setNome('atributo');
$atributo->setAtributos('nome, tipo, tamanho, indice, auto_increment');
$atributo->setSeparador(',');

$metodos = new Tabela();
$metodos->setNome('metodo');
$metodos->setAtributos('assinatura, documentacao');
$metodos->setSeparador(',');



$bancodedados = new Tabela();
$bancodedados->setNome('banco_de_dados');
$bancodedados->setAtributos('nome, host, senha, tipo');
$bancodedados->setSeparador(',');


$pagina = new Tabela();
$pagina->setNome('pagina');
$pagina->setAtributos('nome, objeto, atividade, conteudo_anterior, conteudo_posterior');
$pagina->setSeparador(',');

$arquivo = new Tabela();
$arquivo->setNome('arquivo');
$arquivo->setAtributos('caminho, nome, conteudo');
$arquivo->setSeparador(',');

$instanciador_rapido = new Tabela();
$instanciador_rapido->setNome('instanciador_rapido');
$instanciador_rapido->setAtributos('nome_do_software,nome_do_objeto,string_de_atributos, string_de_tipos');
$instanciador_rapido->setSeparador(',');




$tabelas = array($tabela, $softwareTb,$objeto, $atributo, $metodos, $bancodedados, $pagina, $arquivo, $instanciador_rapido);



$software->setTabelas($tabelas);

$banco = new Banco();
$banco->setHost('host');
$banco->setName('blog');
$banco->setPass('cocacola@12');
$banco->setPort('8080');
$banco->setType('mysql');

$software->setBanco($banco);




$controlador = new Controlador();
$controlador->setSoftware($software);
$controlador->geraSoftware();


/*

$banco = new Tabela();
$banco->setAtributos('name, host, pass, type, port');
$banco->setSeparador(',');
$banco->setNome('banco');

$controlador = new Controlador();
$controlador->setTabela($banco);
$controlador->geraSoftware();

*/

?>