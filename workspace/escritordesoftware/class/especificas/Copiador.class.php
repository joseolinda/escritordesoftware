
<?php

class Copiador
{

	private $Caminho_inicial;
	private $Caminho_final;

	public function setCaminho_inicial($caminho_inicial)
	{
			
		$this->Caminho_inicial= $caminho_inicial;
			
	}
	public function getCaminho_inicial()
	{
			
		return $this->Caminho_inicial;
			
	}

	public function setCaminho_final($caminho_final)
	{
			
		
		$this->Caminho_final= $caminho_final;
			
	}
	public function getCaminho_final()
	{
			
		return $this->Caminho_final;
			
	}


	public function copiarArquivo()
	{

		

//		echo '<h1>'.$this->Caminho_inicial.'-'.$this->Caminho_final.'</h1>';
	
		if(file_exists($this->Caminho_final))
		{
			
			echo '<br><b>Copiador</b>: O arquivo" '.$this->Caminho_final.' " já existe e será substituído.<br>';
			
			unlink($this->Caminho_final);
			if(copy($this->Caminho_inicial, $this->Caminho_final))
			{
				echo '<br><b>Copiador</b>: Copia de "'.$this->Caminho_final. '" feita com sucesso';

			}
			else
			{
				echo '<br><b>Copiador</b>Erro Copia de arquivo:</b>'.$this->Caminho_final;
			}

				
		}else
		{
			echo '<br><b>COpiador:</b> O arquivo "'.$this->Caminho_final.'" não existe será criado<br>';
			if(copy($this->Caminho_inicial, $this->Caminho_final)){
				echo '<br><b>COpiador:</b>Copia feita<br>';
			}else{
				echo '<br><b>COpiador:</b>copia mal sucedida<br>';
			}
				
		}


			
	}


}
?>