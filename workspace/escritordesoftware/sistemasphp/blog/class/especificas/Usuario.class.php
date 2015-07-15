
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
	private $Login;
	private $Senha;
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
			

} //encerrando a classe
?>