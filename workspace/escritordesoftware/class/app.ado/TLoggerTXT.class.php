<?php


class TLoggerTXT extends TLogger
{
	
	public function write($message){
		
		date_default_timezone_set('America/Sao_Paulo');
		$time = date("Y-m-d H:i:s");
		//monta  a estring
		$text = "$time :: $message\n";
		//Adiciona ao final do arquivo
		$handler = fopen($this->filename, 'a');
		fwrite($handler, $text);
		fclose($handler);
		
		
	}
	
}


?>