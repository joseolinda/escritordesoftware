<?php

/**
 * Classe feita para manipulação do objeto objeto
 * feita automaticamente com programa gerador de software inventado por
 * Autor Jefferson Uchôa Ponte
 *
 *
 */
class Objeto
{


	private $Id;		
	private $Nome;
	private $Persistencia;
	private $Array_de_atributos;
	private $Id_software;
	
	
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
	public function setPersistencia($persistencia)
	{
		$this->Persistencia= $persistencia;
	}
	public function getPersistencia(){
		
		return $this->Persistencia;
		
	}
	public function getBanco_de_dados()
	{
		return $this->Persistencia;
	}
	public function setArray_de_atributos($arrayDeAtributos)
	{
		$this->Array_de_atributos = $arrayDeAtributos;
	}
	
	public function getArray_de_atributos()
	{
		return $this->Array_de_atributos;
	}

	public function setIdSoftware($id_software){
		$this->Id_software = $id_software;
	}
	public function getIdSoftware(){
		return $this->Id_software;
		
	}
		
}
?>