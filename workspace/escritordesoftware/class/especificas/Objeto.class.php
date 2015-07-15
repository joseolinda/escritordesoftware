<?php


class Objeto
{
	private $id;
	private $nome;
	private $listaDeAtributos;
	private $persistencia;
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	public function __construct()
	{
		$this->listaDeAtributos = array();
		
	}
	
	public function setNome($nome)
	{

		//O nome tem que ser sempre sem espaços, com a primeira letra maiúscula
		//E não vai ter mais do que 101 caracteres. 
		//também evitaremos os espaços e acentos
		
		$nome = strtoupper(substr($nome, 0, 1)).substr($nome, 1, 100);
		$novo_nome = preg_replace("/[^a-zA-Z0-9]/", "", $nome);
		$this->nome = $novo_nome;
		
	}
	public function getNome(){
		return $this->nome;
	}
	
	
	public function addAtributo(Atributo $atributo){
		$this->listaDeAtributos[] = $atributo; 
		
	}
	public function getAtributos(){
		
		return $this->listaDeAtributos;
		
	}
	public function setPersistencia($persistencia){
		$this->persistencia = $persistencia;
		
		
	}
	public function getPersistencia(){
		return $this->persistencia;
		
		
	}
}


?>