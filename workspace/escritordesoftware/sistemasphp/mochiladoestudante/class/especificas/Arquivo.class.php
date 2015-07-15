
<?php
		
/**
* Classe feita para manipulação do objeto Arquivo
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class Arquivo
{
	private $Id;
	private $Descricao;
	private $Titulo;
	private $Datadeenvio;
	private $Nomedoarquivo;
	private $Usuario;
	private $Categoria;
	public function setId($id)
	{

		$this->Id = $id;
			
	}

	public function getId()
	{
		return $this->Id;
			
	}
			

	public function setDescricao($descricao)
	{

		$this->Descricao = $descricao;
			
	}

	public function getDescricao()
	{
		return $this->Descricao;
			
	}
			

	public function setTitulo($titulo)
	{

		$this->Titulo = $titulo;
			
	}

	public function getTitulo()
	{
		return $this->Titulo;
			
	}
			

	public function setDatadeenvio($datadeenvio)
	{

		$this->Datadeenvio = $datadeenvio;
			
	}

	public function getDatadeenvio()
	{
		return $this->Datadeenvio;
			
	}
			

	public function setNomedoarquivo($nomedoarquivo)
	{

		$this->Nomedoarquivo = $nomedoarquivo;
			
	}

	public function getNomedoarquivo()
	{
		return $this->Nomedoarquivo;
			
	}
			

	public function setUsuario(Usuario $usuario)
	{

		$this->Usuario = $usuario;
			
	}
	public function getUsuario()
	{
		return $this->Usuario;
			
	}
			

	public function setCategoria(Categoria $categoria)
	{

		$this->Categoria = $categoria;
			
	}
	public function getCategoria()
	{
		return $this->Categoria;
			
	}
			

} //encerrando a classe
?>