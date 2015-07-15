
<?php
		
/**
* Classe feita para manipulação do objeto Pessoa
* feita automaticamente com programa gerador de software inventado por
* Autor Jefferson Uchôa Ponte
*
*
*/
class Pessoa
{
	private $Nome;
	private $Id;
	public function setNome(Texto $nome)
	{

		$this->Nome = $nome;
			
	}
	public function getNome()
	{
		return $this->Nome;
			
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