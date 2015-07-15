
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
	private $Nome;
	private $Email;
	private $Login;
	private $Senha;
	private $Nivel;
	private $Datadecadastro;
	private $Horadecadastro;
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
			

	public function setEmail($email)
	{

		$this->Email = $email;
			
	}

	public function getEmail()
	{
		return $this->Email;
			
	}
			

	public function setLogin($login)
	{

		$this->Login = $login;
			
	}

	public function getLogin()
	{
		return $this->Login;
			
	}
			

	public function setSenha($senha)
	{

		$this->Senha = $senha;
			
	}

	public function getSenha()
	{
		return $this->Senha;
			
	}
			

	public function setNivel($nivel)
	{

		$this->Nivel = $nivel;
			
	}

	public function getNivel()
	{
		return $this->Nivel;
			
	}
			

	public function setDatadecadastro($datadecadastro)
	{

		$this->Datadecadastro = $datadecadastro;
			
	}

	public function getDatadecadastro()
	{
		return $this->Datadecadastro;
			
	}
			

	public function setHoradecadastro($horadecadastro)
	{

		$this->Horadecadastro = $horadecadastro;
			
	}

	public function getHoradecadastro()
	{
		return $this->Horadecadastro;
			
	}
			

} //encerrando a classe
?>