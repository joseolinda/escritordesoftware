
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
	private $Data;
	private $Usuario;
	private $Caminhofoto;
	private $Hora;
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
			

	public function setCorpo($corpo)
	{

		$this->Corpo = $corpo;
			
	}

	public function getCorpo()
	{
		return $this->Corpo;
			
	}
			

	public function setData($data)
	{

		$this->Data = $data;
			
	}

	public function getData()
	{
		return $this->Data;
			
	}
			

	public function setUsuario(Usuario $usuario)
	{

		$this->Usuario = $usuario;
			
	}
	public function getUsuario()
	{
		return $this->Usuario;
			
	}
			

	public function setCaminhofoto($caminhofoto)
	{

		$this->Caminhofoto = $caminhofoto;
			
	}

	public function getCaminhofoto()
	{
		return $this->Caminhofoto;
			
	}
			

	public function setHora($hora)
	{

		$this->Hora = $hora;
			
	}

	public function getHora()
	{
		return $this->Hora;
			
	}
			

} //encerrando a classe
?>