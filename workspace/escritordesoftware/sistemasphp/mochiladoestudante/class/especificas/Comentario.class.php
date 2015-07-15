
<?php
		
/**
* Classe feita para manipulação do objeto Comentario
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class Comentario
{
	private $Id;
	private $Texto;
	private $Usuario;
	private $Arquivo;
	private $Data;
	private $Hora;
	public function setId($id)
	{

		$this->Id = $id;
			
	}

	public function getId()
	{
		return $this->Id;
			
	}
			

	public function setTexto($texto)
	{

		$this->Texto = $texto;
			
	}

	public function getTexto()
	{
		return $this->Texto;
			
	}
			

	public function setUsuario(Usuario $usuario)
	{

		$this->Usuario = $usuario;
			
	}
	public function getUsuario()
	{
		return $this->Usuario;
			
	}
			

	public function setArquivo(Arquivo $arquivo)
	{

		$this->Arquivo = $arquivo;
			
	}
	public function getArquivo()
	{
		return $this->Arquivo;
			
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
			

} //encerrando a classe
?>