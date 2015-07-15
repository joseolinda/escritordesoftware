<?php 

class Banco
{
	private $Nome;
	private $Atributos;
	private $Separador;

	public function setNome($nome)
	{
		$this->Nome= $nome;

	}
	public function getNome()
	{
		return $this->Nome;

	}
	public function setAtributos($atributos)
	{
		$this->Atributos= $atributos;

	}
	public function getAtributos()
	{
		return $this->Atributos;

	}
	public function setSeparador($separador)
	{
		$this->Separador= $separador;

	}
	public function getSeparador()
	{
		return $this->Separador;

	}
}

?>