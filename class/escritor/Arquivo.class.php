<?php



class Arquivo{
	private $Conteudo;
	private $Caminho;



	public function setConteudo($conteudo){
		$this->Conteudo = $conteudo;

	}
	public function setCaminho($caminho){
		$this->Caminho = $caminho;
	}


	public function criaArquivo()
	{

		// diretório onde encontra-se o arquivo
		$filename = $this->Caminho;

		// verifica se existe o arquivo
		if(file_exists($filename)){
			$script = file_get_contents($filename);
		} else {
			$script = "";
		}

		//Adciona um novo texto
		$script = $this->Conteudo. $script;

		//Escrevendo
		$file = @fopen($filename, "w+");
		@fwrite($file, stripslashes($script));
		@fclose($file);

	}


}


?>