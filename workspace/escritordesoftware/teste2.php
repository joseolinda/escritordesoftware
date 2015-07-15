<?php
function __autoload($classe){


	if(file_exists("class/especificas/{$classe}.class.php"))
	{
		include_once "class/especificas/{$classe}.class.php";

	}elseif (file_exists("class/app.ado/{$classe}.class.php"))
	{
		include_once "class/app.ado/{$classe}.class.php";

	}


}

/*

$site = new Site();
$site->setNome('minhapagina1');
	$software = new Software();
	$software->setNome('teste');
	$softwares = array($software);
	$site->setSoftwares($softwares);
	
	
	
	$objeto = new Objeto();
	$objeto->setNome('pessoa');
	
	
	$atributo = new Atributo();
	$atributo->setNome('nome');
	$atributo2 = new Atributo();
	$atributo2->setNome('telefone');
	$atributos = array($atributo, $atributo2);
	
	$objeto->setAtributos($atributos);
	$objetos = array($objeto);
	$software->setObjetos($objetos);
		
			
			$metodo = new Metodo();
			$metodo->setAssinatura('teste');
			$metodo->setDocumentacao('teste');
	
	$banco_de_dados = new Banco_de_dados();
	$site->setBanco_de_dados($banco_de_dados);
	
	$escritor = new Escritor();
	$escritor->setSite($site);
	$escritor->geraSite();
	
	*/

$instanciador1 = new Instanciador_rapido();
$instanciador1->setNome_do_site('gcsufc');
$instanciador1->setNome_do_objeto('blog');
$instanciador1->setNome_do_software('blog');
$instanciador1->setString_de_atributos('id, titulo, corpo, usuario, categoria, data, hora');
$instanciador1->setString_de_tipos('int, text, text, objeto, objeto, data, text');



$instanciador2 = new Instanciador_rapido();
$instanciador2->setNome_do_objeto('categoria');
$instanciador2->setNome_do_site('gcsufc');
$instanciador2->setNome_do_software('categoria');
$instanciador2->setString_de_atributos('id, nome');
$instanciador2->setString_de_tipos('int, text');
	
$instanciador3 = new Instanciador_rapido();
$instanciador3->setNome_do_objeto('autor');
$instanciador3->setNome_do_site('gcsufc');
$instanciador3->setNome_do_software('autor');
$instanciador3->setString_de_atributos('id, nome, nome_completo, ultimo_nome ');
$instanciador3->setString_de_tipos('int, text');

$instanciador4 = new Instanciador_rapido();
$instanciador4->setNome_do_objeto('sessao');
$instanciador4->setNome_do_site('gcsufc');
$instanciador4->setNome_do_software('sessao');
$instanciador4->setString_de_atributos('usuario');
$instanciador4->setString_de_tipos('objeto');

$instanciador5 = new Instanciador_rapido();
$instanciador5->setNome_do_objeto('usuario');
$instanciador5->setNome_do_site('gcsufc');
$instanciador5->setNome_do_software('usuario');
$instanciador5->setString_de_atributos('id, nome, login, email, senha, nivel, data');
$instanciador5->setString_de_tipos('int');



$instanciador6 = new Instanciador_rapido();
$instanciador6->setNome_do_objeto('livro');
$instanciador6->setNome_do_site('gcsufc');
$instanciador6->setNome_do_banco_de_dados('mvlineco_GCSUFC');
$instanciador6->setNome_do_software('livro');
$instanciador6->setString_de_atributos('id, referencia, autor, titulo, categoria, descricao, caminho_foto, link_de_download');
$instanciador6->setString_de_tipos('int, text, objeto, text, objeto, text, text, text');

$instanciadores = array($instanciador1, $instanciador2, $instanciador3, $instanciador4, $instanciador5, $instanciador6);

Instanciador_rapido::instanciaObjetos($instanciadores);

?>