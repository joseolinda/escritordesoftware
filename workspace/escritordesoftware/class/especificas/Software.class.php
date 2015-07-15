
<?php

class Software
{

	private $Nome = 'meu_software';
	private $Objetos;
	

	public function __construct($nome_do_software, $array_de_objetos){
		$this->Objetos = $array_de_objetos;
		$this->Nome = $nome_do_software;
		
		
	}
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