
<?php
		
/**
* Classe feita para manipulação do objeto Carro
* feita automaticamente com programa gerador de software inventado por
* Autor Jefferson Uchôa Ponte
*
*
*/
class Carro
{
	private $Id;
	private $Modelo;
	private $Cor;
	public function setId($id)
	{

		$this->Id = $id;
			
	}

	public function getId()
	{
		return $this->Id;
			
	}
			

	public function setModelo($modelo)
	{

		$this->Modelo = $modelo;
			
	}

	public function getModelo()
	{
		return $this->Modelo;
			
	}
			

	public function setCor($cor)
	{

		$this->Cor = $cor;
			
	}

	public function getCor()
	{
		return $this->Cor;
			
	}
			

} //encerrando a classe
?>