<?php



class Arquivo{
	private $Conteudo;
	private $Caminho;



	public function setConteudo($conteudo)
	{
		$this->Conteudo = $conteudo;

	}
	public function setCaminho($caminho){
		if(is_string($caminho))
		{
			$caminho = trim($caminho);
			$this->Caminho = $caminho;
		}
		else
		{
				
			echo '<br>Erro ao tentar definir caminho de arquivo';
				
		}
		
		
		
		
	}


	public function criaArquivo()
	{

		// diretório onde encontra-se o arquivo
		$filename = $this->Caminho;

		// verifica se existe o arquivo
		if(file_exists($filename))
		{
			//Se fosse pra escrever logo a baixo do conteudo existente
			//$script = file_get_contents($filename);
			$script = "";
			echo '<br><b>Arquivo:</b> '.$this->Caminho.' existe, será deletado e recriado.<br>';

			if(unlink($filename))
			{
				echo '<br><b>Arquivo</b>:\' '.$this->Caminho.'\' deletado';
			}
			else
			{
				echo '<br>Erro ao tentar excluir: '.$this->Caminho;
			}
				
		}
		else
		{
			$script = "";
			echo '<br>O arquivo:\' '.$this->Caminho. ' \' não existe, tentarei criá-lo.<br>';
		}


		//Adciona um novo texto
		$script = $this->Conteudo. $script;

		//Escrevendo
		$file = @fopen($filename, "w+");
		if($file){
			echo '<br><b>Arquivo:</b> '.$this->Caminho.' Criado com sucesso!<br>';
				
		}else{
			echo '<br><b>Arquivo:</b> '.$this->Caminho.' não foi criado. Verifique as permissões para este diretório.<br>';
		}
		
		@fwrite($file, stripslashes($script));
		@fclose($file);
	

	}


}


?>