
<?php
		
/**
* Classe feita para manipulação do objeto Forum
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class Forum
{
	private $Id;
	private $Titulo;
	private $Corpo;
	private $Usuario;
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
			

	public function setUsuario(Usuario $usuario)
	{

		$this->Usuario = $usuario;
			
	}
	public function getUsuario()
	{
		return $this->Usuario;
			
	}
			

} //encerrando a classe
?>