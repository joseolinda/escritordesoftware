<?php


class Atributo{
	private $id;
	private $nome;
	private $tipo;
	private $indice;
	private $tipoDeRelacionamentoComObjeto;
	
	
	public function setId($id){
		
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	public function setNome($nome){
		if(is_string($nome)){
			$novo_nome = preg_replace("/[^a-zA-Z0-9]/", "", $nome);
			$this->nome = $novo_nome;
		}		
	}
	public function getNome(){
		return $this->nome;
	}
	
	public function setTipo($tipo){
		
		$this->tipo = $tipo;
		
	}	
	public function getTipo(){
		return $this->tipo;
		
		
	}
	
	public function setIndice($indice){
		$this->indice = $indice;
		
		
	}
	public function getIndice(){
		return $this->indice;
		
	}
	
	public function setTipoDeRelacionamentoComObjeto($tipoDeRelacionamento){
		
		$this->tipoDeRelacionamentoComObjeto = $tipoDeRelacionamento;
		
	}
	public function getTipoDeRelacionamentoComObjeto(){
		return $this->tipoDeRelacionamentoComObjeto;
		
	}
	
	
}


?>