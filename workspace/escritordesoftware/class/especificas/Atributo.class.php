<?php

/**
 * Classe feita para manipulação do objeto atributo
 * feita automaticamente com programa gerador de software inventado por
 * Autor Jefferson Uchôa Ponte
 *
 *
 */
class Atributo
{


	private $Id;		
	private $Nome;
	private $Tipo;
	private $Tamanho;
	private $Id_objeto;
	
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
	public function setTipo($tipo)
	{
		$this->Tipo = $tipo;
	}
	public function getTipo(){
		return $this->Tipo;
		
	}
	public function setTamanho($tamanho){
		$this->Tamanho = $tamanho;
	}
	public function getTamanho(){
		return $this->Tamanho;
	}
		
	public function setId_objeto($id_objeto)
	{
		$this->Id_objeto = $id_objeto;
	}
	public function getId_objeto()
	{
		return $this->Id_objeto;
	}	
}
?>