<?php


/**
 * Esta classe descreve como serão os comportamentos das classes que escrevem software. 
 * 
 * @author jefferson
 *
 */
abstract class Escritor{
	protected $software;
	
	public function setSoftware(Software $software){
		$this->software = $software;
	}
	/**
	 * Esse metodo foi feito para criar a estrutura de pastas. 
	 * Vai depender de cada tipo de software. Aí vem o trabalho de sobrescrita. 
	 */

	public function criaEstrutura(){
		
		
		
	}
	public function copiaArquivosImportantes(){
		
		
	}
	public function criaClasses(){
	
	}
	public function escreverSoftware(){
		
		$this->criaEstrutura();
		$this->copiaArquivosImportantes();
		$this->criaClasses();
		
	}
	
	
	
	
}



?>