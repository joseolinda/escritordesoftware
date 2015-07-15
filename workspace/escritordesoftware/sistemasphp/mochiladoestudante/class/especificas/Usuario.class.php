
<?php
		
/**
* Classe feita para manipulação do objeto Usuario
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class Usuario
{
	private $Id;
	private $Nom;
	private $Email;
	private $Nomedeusuario;
	private $Senha;
	private $Instituicao;
	private $Niveldeacesso;
	private $Foto;
	public function setId($id)
	{

		$this->Id = $id;
			
	}

	public function getId()
	{
		return $this->Id;
			
	}
			

	public function setNom($nom)
	{

		$this->Nom = $nom;
			
	}

	public function getNom()
	{
		return $this->Nom;
			
	}
			

	public function setEmail($email)
	{

		$this->Email = $email;
			
	}

	public function getEmail()
	{
		return $this->Email;
			
	}
			

	public function setNomedeusuario($nomedeusuario)
	{

		$this->Nomedeusuario = $nomedeusuario;
			
	}

	public function getNomedeusuario()
	{
		return $this->Nomedeusuario;
			
	}
			

	public function setSenha($senha)
	{

		$this->Senha = $senha;
			
	}

	public function getSenha()
	{
		return $this->Senha;
			
	}
			

	public function setInstituicao($instituicao)
	{

		$this->Instituicao = $instituicao;
			
	}

	public function getInstituicao()
	{
		return $this->Instituicao;
			
	}
			

	public function setNiveldeacesso($niveldeacesso)
	{

		$this->Niveldeacesso = $niveldeacesso;
			
	}

	public function getNiveldeacesso()
	{
		return $this->Niveldeacesso;
			
	}
			

	public function setFoto($foto)
	{

		$this->Foto = $foto;
			
	}

	public function getFoto()
	{
		return $this->Foto;
			
	}
			

} //encerrando a classe
?>