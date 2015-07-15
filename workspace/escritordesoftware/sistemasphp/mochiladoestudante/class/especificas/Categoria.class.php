
<?php
		
/**
* Classe feita para manipulação do objeto Categoria
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class Categoria
{
	private $Id;
	private $Nome;
	private $Descricao;
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
			

	public function setDescricao($descricao)
	{

		$this->Descricao = $descricao;
			
	}

	public function getDescricao()
	{
		return $this->Descricao;
			
	}
			

} //encerrando a classe
?>