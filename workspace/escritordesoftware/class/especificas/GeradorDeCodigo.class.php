<?php 


/**
 * classe Abstrata, ela gera o codigo que sera escrito no Software, 
 * juntamente com os nomes de seus arquivos. 
 * É uma mãe que dará origem a classes que geram os codigos de cada linguagem.  
 * @author jefferson
 *
 */
abstract class GeradorDeCodigo{
	/**
	 * Esse parametro é o conteúdo do arquivo que será retornado. 
	 * @var String
	 * 
	 */
	protected $codigo;
	/**
	 * Esse é o caminho da pasta
	 * @var String
	 */
	protected $caminho;
	
	
	public function getCodigo(){
		return $this->codigo;
	}
	public function getCaminho(){
		return $this->caminho;
	}
	
	/**
	 * Esse metodo retonra um array de objetos do tipo GeradorDeCodigo. 
	 * Esse array pode ser usado para gerar os arquivos das classes. 
	 * @param Software $software
	 */
	public static function geraClasses(Software $software){
		
		
		
	}
	
	
	
	
}

?>