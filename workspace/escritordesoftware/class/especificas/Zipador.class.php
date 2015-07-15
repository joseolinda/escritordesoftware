<?php

/**
 * Classe utilitária para zipar arquivos de um diretório
 * 
 * @author jefferson
 *
 */
class Zipador{

	private $arrayDeArquivos;

	/**
	 * 
	 * @return string
	 */
	public function getArrayDeArquivos(){
		
		return $this->arrayDeArquivos;
	}
	/**
	 * 
	 * @param unknown $diretorio
	 * @param unknown $arquivoFinal
	 */
	public function zipaArquivo($diretorio, $arquivoFinal){
		$this->browse($diretorio);
		
		$directory = $diretorio; //diretorio para compactar
		$zipfile = $arquivoFinal; // nome do zip gerado

		// Array de arquivos
		$filenames = $this->arrayDeArquivos;
		
		
		// cria zip, adiciona arquivos...
		$zip = new ZipArchive();
		
		if ( $zip->open($zipfile, ZIPARCHIVE::CREATE) !== TRUE )
		{
			exit("Não pode abrir: <$zipfile>\n");
		}
		
		foreach ($filenames as $filename)
		{
			$file = $filename;
			$arquivo = substr($file, -3);
			$zip->addFile($filename,$filename);
		}
		
		echo "Total de arquivos: <b>" . $zip->numFiles . "</b>\n";
		$zip->close();
		
		
		
		
		
	}
	/**
	 * O objetivo deste método é receber o nome de um dretorio e retornar um array com todos 
	 * os arquivos de dentro, inclusive os arquivos em subpastas. 
	 * @param unknown $directory
	 * Retorna merda nenhuma.
	 */
	public function browse($dir)
	{
		

		 
					
		if ($handle = opendir($dir))
		{
						
				while (false !== ($file = readdir($handle)))
				{
 
					if ($file != "." && $file != ".." && is_file($dir.'/'.$file))
					{
						$this->arrayDeArquivos[] = $dir.'/'.$file;
					}
					else if ($file != "." && $file != ".." && is_dir($dir.'/'.$file))
					{
						//File é um diretorio.. 
						//Vamos abrilo e percorrer seus elementos. 
						
						$this->browse($dir.'/'.$file);
						//
					}
				}
				closedir($handle);
			}
			
				

		
	}
}