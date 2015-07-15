<?php


class Software{
	private $id;
	private $nome;
	private $linguagem;
	private $listaDeObjetos;
	private $bancoDeDados;

	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;	
	}
	
	public function setNome($nome){
		
		$this->nome = $nome;
		
	}
	
	public function getNome(){
		return $this->nome;
		
	}
	
	public function setLinguagem($linguagem){
		$this->linguagem = $linguagem;
	}
	public function getLinguagem(){
		return $this->linguagem;
	}
	
	public function setBancoDeDados(BancoDeDados $bancoDeDados){
		$this->bancoDeDados = $bancoDeDados;
		
	}
	public function getBancoDeDados(){
		return $this->bancoDeDados;
	}
	
	public function addObjetoNaLista(Objeto $objeto){
		$this->listaDeObjetos[] = $objeto;
		
	}
	public function getListaDeObjetos(){
		return $this->listaDeObjetos;
	}
	
	public function escreverSoftware(){
		//escreve o software
	}
	
	
	
}



?>