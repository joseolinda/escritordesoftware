<?php
class BancoDeDados 
{
	private $id;
	private $nomeDoBanco;
	private $sistemaGerenciadorDeBancoDeDados;
	private $host;
	private $pass;
	private $usuario;

	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	
	
	public function setSistemaGerenciadorDeBancoDeDados($sgdb = "mysql"){
		
		$this->sistemaGerenciadorDeBancoDeDados = $sgdb;
		
		
	}
	public function getSistemaGerenciadorDeBancoDeDados(){
		
		return $this->sistemaGerenciadorDeBancoDeDados;
	}
	
	
	public function setNomeDoBanco($nomeDoBanco) {
		$this->nomeDoBanco = $nomeDoBanco;
	}
	public function getNomeDoBanco(){
		return $this->nomeDoBanco;
	}
	

	public function setHost($host){
		$this->host = $host;
	
	
	}
	
	public function getHost(){
		return $this->host;
	}
	
	
	
	public function setPass($pass){
		$this->pass = $pass;
	
	}
	public function getPass(){
		return $this->pass;
	}
	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}
	public function getUsuario(){
		return $this->usuario;
	}
}

?>