
<?php

class Objeto
{


	public $Nome;
	private $Atributos;
	private $Persistencia = true;
	private $Documentacao;
	
	

	public function __construct($nome_do_objeto, $array_de_atributos, $persistencia = null, $documentacao = null)
	{
		$this->Nome = $nome_do_objeto;
		$this->Atributos = $array_de_atributos;
		if($persistencia)
		{
		$this->Persistencia = $persistencia;
		
		}
		if($documentacao)
		{
			$this->Documentacao = $documentacao;
			
		}
		
		
		
	}

	
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