
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
	private $Cor;
	private $Ano;
	private $Modelo;
	private $Pessoa;
	private $Id;
	public function setCor(Texto $cor)
	{

		$this->Cor = $cor;
			
	}
	public function getCor()
	{
		return $this->Cor;
			
	}
			

	public function setAno(Texto $ano)
	{

		$this->Ano = $ano;
			
	}
	public function getAno()
	{
		return $this->Ano;
			
	}
			

	public function setModelo(Texto $modelo)
	{

		$this->Modelo = $modelo;
			
	}
	public function getModelo()
	{
		return $this->Modelo;
			
	}
			

	public function setPessoa(Pessoa $pessoa)
	{

		$this->Pessoa = $pessoa;
			
	}
	public function getPessoa()
	{
		return $this->Pessoa;
			
	}
			

	public function setId(Inteiro $id)
	{

		$this->Id = $id;
			
	}
	public function getId()
	{
		return $this->Id;
			
	}
			

} //encerrando a classe
?>