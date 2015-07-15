
<?php
		
/**
* Classe feita para manipulação do objeto Livro
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class Livro
{
	private $Id;
	private $Titulo;
	private $Autor;
	private $Data;
	private $Hora;
	private $Usuario;
	private $Descricao;
	private $Link0;
	private $Link1;
	private $Link2;
	private $Visibilidade;
	private $Caminhofoto;
	private $Fdsifhsodfjos;
	public function setId($id)
	{

		$this->Id = $id;
			
	}

	public function getId()
	{
		return $this->Id;
			
	}
			

	public function setTitulo($titulo)
	{

		$this->Titulo = $titulo;
			
	}

	public function getTitulo()
	{
		return $this->Titulo;
			
	}
			

	public function setAutor($autor)
	{

		$this->Autor = $autor;
			
	}

	public function getAutor()
	{
		return $this->Autor;
			
	}
			

	public function setData($data)
	{

		$this->Data = $data;
			
	}

	public function getData()
	{
		return $this->Data;
			
	}
			

	public function setHora($hora)
	{

		$this->Hora = $hora;
			
	}

	public function getHora()
	{
		return $this->Hora;
			
	}
			

	public function setUsuario(Usuario $usuario)
	{

		$this->Usuario = $usuario;
			
	}
	public function getUsuario()
	{
		return $this->Usuario;
			
	}
			

	public function setDescricao($descricao)
	{

		$this->Descricao = $descricao;
			
	}

	public function getDescricao()
	{
		return $this->Descricao;
			
	}
			

	public function setLink0($link0)
	{

		$this->Link0 = $link0;
			
	}

	public function getLink0()
	{
		return $this->Link0;
			
	}
			

	public function setLink1($link1)
	{

		$this->Link1 = $link1;
			
	}

	public function getLink1()
	{
		return $this->Link1;
			
	}
			

	public function setLink2($link2)
	{

		$this->Link2 = $link2;
			
	}

	public function getLink2()
	{
		return $this->Link2;
			
	}
			

	public function setVisibilidade($visibilidade)
	{

		$this->Visibilidade = $visibilidade;
			
	}

	public function getVisibilidade()
	{
		return $this->Visibilidade;
			
	}
			

	public function setCaminhofoto($caminhofoto)
	{

		$this->Caminhofoto = $caminhofoto;
			
	}

	public function getCaminhofoto()
	{
		return $this->Caminhofoto;
			
	}
			

	public function setFdsifhsodfjos(Texto $fdsifhsodfjos)
	{

		$this->Fdsifhsodfjos = $fdsifhsodfjos;
			
	}
	public function getFdsifhsodfjos()
	{
		return $this->Fdsifhsodfjos;
			
	}
			

} //encerrando a classe
?>