<?php

/**
 * Classe feita para manipulação do objeto software
 * feita automaticamente com programa gerador de software inventado por
 * Autor Jefferson Uchôa Ponte
 *
 *
 */
class Software
{

	private $Id;		
	private $Nome;
	private $Software;
	private $ArrayDeObjetos;
	private $Banco_de_dados;
	

	public function setId($id)
	{
		$this->Id = $id;

	}

	public function getId()
	{
		return $this->Id;

	}

		
	public function setNome($nome)
	{
		$this->Nome = $nome;

	}

	public function getNome()
	{
		return $this->Nome;

	}	
	public function setSoftware($software)
	{
		$this->Software = $software;

	}
	public function getSoftware()
	{
		return $this->Software;
	}
	public function setBanco_de_dados($banco_de_dados)
	{
		$this->Banco_de_dados = $banco_de_dados;
	}
	public function getBanco_de_dados()
	{
		return $this->Banco_de_dados;
	}
	public function setArrayDeObjetos($array_de_objetos)
	{
		$this->ArrayDeObjetos = $array_de_objetos;
	}
	public function getArrayDeObjetos(){
		return $this->ArrayDeObjetos;
	}
	public function setBancoDeDados($bancoDeDados){
		$this->Banco_de_dados = $bancoDeDados;
	}
	public function getBancoDeDados()
	{
		return $this->Banco_de_dados;
		
	}
		
}
?>