
<?php

class Software
{

	private $Nome = 'meu_software';
	private $Objetos;

	public function setNome($nome)
	{
			
		$this->Nome= $nome;
			
	}
	public function getNome()
	{
			
		return $this->Nome;
			
	}
		
	public function setObjetos($objetos)
	{
			
		$this->Objetos= $objetos;
			
	}
	public function getObjetos()
	{
			
		return $this->Objetos;
			
	}
		
}
?>