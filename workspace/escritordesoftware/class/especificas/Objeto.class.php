
<?php

class Objeto
{


	public $Nome = 'objeto';
	private $Atributos;
	private $Persistencia = true;
	private $Documentacao;


	public function setNome($nome)
	{
		$this->Nome = $nome;
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
		
	public function setPersistencia($persistencia)
	{
			
		$this->Persistencia= $persistencia;
			
	}
	public function getPersistencia()
	{
			
		return $this->Persistencia;
			
	}
		
	public function setDocumentacao($documentacao)
	{
			
		$this->Documentacao= $documentacao;
			
	}
	public function getDocumentacao()
	{
			
		return $this->Documentacao;
			
	}
		
}
?>