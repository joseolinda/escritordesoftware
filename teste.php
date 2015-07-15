<?php

/*
 $criar = fopen("arquivo.php", "w+");
if($criar==false)
	die("impossivel criar o arquivo");
*/

/*
 // diretório onde encontra-se o arquivo
$filename = "meu_arquivo.php";

// verifica se existe o arquivo
if(file_exists($filename)){
$script = file_get_contents($filename);
} else {
$script = "";
}

//Adciona um novo texto
$script = "Meu texto!!!" . $script;

//Escrevendo
$file = @fopen($filename, "w+");

@fwrite($file, stripslashes($script));
@fclose($file);

*/

function __autoload($classe){


	if(file_exists("class/escritor/{$classe}.class.php"))
	{
		include_once "class/escritor/{$classe}.class.php";

	}


}


$banco = new Banco();
$banco->setAtributos('id, nome, telefone');
$banco->setSeparador(',');
$banco->setNome('agendatelefonica');

$controlador = new Controlador();
$controlador->setBanco($banco);
$controlador->geraSoftware();





?>