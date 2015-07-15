<?php
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
?>