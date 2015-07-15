<?php

/**
 * Classe feita para manipulação do objeto autor
 * feita automaticamente com programa gerador de software inventado por
 * Autor Jefferson Uchôa Ponte
 *
 *
 */
class Autor
{


	private $Id;
		
	private $Nome;
		
	private $Nome_completo;
		
	private $Ultimo_nome;
		
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

		
	public function setNome_completo($nome_completo)
	{
		$this->Nome_completo = $nome_completo;

	}

	public function getNome_completo()
	{
		return $this->Nome_completo;

	}

		
	public function setUltimo_nome($ultimo_nome)
	{
		$this->Ultimo_nome = $ultimo_nome;

	}

	public function getUltimo_nome()
	{
		return $this->Ultimo_nome;

	}

		
}
?>