
<?php

class Pagina
{

	private $Nome;

	private $Objeto;

	private $Atividade;

	private $Conteudo_anterior;

	private $Conteudo_posterior;

	public function setNome($nome)
	{
			
		$this->Nome= $nome;
			
	}
	public function getNome()
	{
			
		return $this->Nome;
			
	}
		
	public function setObjeto($objeto)
	{
			
		$this->Objeto= $objeto;
			
	}
	public function getObjeto()
	{
			
		return $this->Objeto;
			
	}
		
	public function setAtividade($atividade)
	{
			
		$this->Atividade= $atividade;
			
	}
	public function getAtividade()
	{
			
		return $this->Atividade;
			
	}
		
	public function setConteudo_anterior($conteudo_anterior)
	{
			
		$this->Conteudo_anterior= $conteudo_anterior;
			
	}
	public function getConteudo_anterior()
	{
			
		return $this->Conteudo_anterior;
			
	}
		
	public function setConteudo_posterior($conteudo_posterior)
	{
			
		$this->Conteudo_posterior= $conteudo_posterior;
			
	}
	public function getConteudo_posterior()
	{
			
		return $this->Conteudo_posterior;
			
	}
		
}
?>