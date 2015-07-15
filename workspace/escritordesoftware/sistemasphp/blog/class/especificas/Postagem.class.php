
<?php
		
/**
* Classe feita para manipulação do objeto Postagem
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class Postagem
{
	private $Id;
	private $Titulo;
	private $Corpo;
	private $Autor;
	private $Juyguygufuguyguyy5678;
	public function setId($id)
	{

		$this->Id = $id;
			
	}

	public function getId()
	{
		return $this->Id;
			
	}
			

	public function setTitulo($Titulo)
	{

		$this->Titulo = $Titulo;
			
	}

	public function getTitulo()
	{
		return $this->Titulo;
			
	}
			

	public function setCorpo($Corpo)
	{

		$this->Corpo = $Corpo;
			
	}

	public function getCorpo()
	{
		return $this->Corpo;
			
	}
			

	public function setAutor(Usuario $Autor)
	{

		$this->Autor = $Autor;
			
	}
	public function getAutor()
	{
		return $this->Autor;
			
	}
			

	public function setJuyguygufuguyguyy5678($juyguygufuguyguyy5678)
	{

		$this->Juyguygufuguyguyy5678 = $juyguygufuguyguyy5678;
			
	}

	public function getJuyguygufuguyguyy5678()
	{
		return $this->Juyguygufuguyguyy5678;
			
	}
			

} //encerrando a classe
?>