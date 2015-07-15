<?php

class Banco_de_dados
{

	public $Id;
	public $Software_id;
	public $Nome;
	public $Host;
	public $Senha;
	public $Usuario;
	
	public function setId($id){
		$this->Id = $id;
		
	}
	public function getId(){
		return $this->Id;
	}
	public function setSoftware_id($software_id){
		$this->Software_id = $software_id;
	}
	public function getSoftware_id(){
		return $this->Software_id;
		
	}
	public function setNome($nome){
		$this->Nome =$nome;
		
	}
	public function getNome()
	{
		return $this->Nome;
		
	}
	public function setHost($host){
		$this->Host = $host;
		
	}
	public function getHost()
	{
		
		return $this->Host;
		
	}
	public function setSenha($senha){
		$this->Senha = $senha;
	}
	
	public function getSenha(){
		return $this->Senha;
	}
	public function setUsuario($usuario){
		$this->Usuario = $usuario;
	}
	public function getUsuario()
	{
		return $this->Usuario;
	}

			
}
?>