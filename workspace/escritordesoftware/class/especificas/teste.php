<?php
include 'Arquivo.class.php';

$arquivo = new Arquivo;

$arquivo->setCaminho ('teste2.php');
$arquivo->setConteudo('Esse é um arquivo de teste');
$arquivo->criaArquivo();





?>
