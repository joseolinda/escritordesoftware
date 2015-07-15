<?php

abstract class TLogger
{
	protected $filename;
	
	public function __construct($filename)
	{
		$this->filename = $filename;
		//Reseta o conteudo do arquivo
		file_put_contents($filename, '');
		
	}
	
	//define o metodo write como obrigatorio
	abstract function write($message);
	
	
}



?>