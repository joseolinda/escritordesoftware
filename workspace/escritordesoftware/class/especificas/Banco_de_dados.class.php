
<?php

class Banco_de_dados
{

	private $Nome = 'meu_banco_de_dados';

	private $Host = 'localhost';

	private $Usuario = 'root';
	
	private $Senha = 'cocacola@12';

	private $Tipo = 'mysql';

	private $Port = '3306';

	public function setNome($nome)
	{
			
		$this->Nome= $nome;
			
	}
	public function getNome()
	{
			
		return $this->Nome;
			
	}
		
	public function setHost($host)
	{
			
		$this->Host= $host;
			
	}
	public function getHost()
	{
			
		return $this->Host;
			
	}
	public function setUsuario($usuario)
	{
		
		$this->Usuario = $usuario;
	}	
	public function getUsuario(){
		return $this->Usuario;
	}
	public function setSenha($senha)
	{
			
		$this->Senha= $senha;
			
	}
	public function getSenha()
	{
			
		return $this->Senha;
			
	}
		
	public function setTipo($tipo)
	{
			
		$this->Tipo= $tipo;
			
	}
	public function getTipo()
	{
			
		return $this->Tipo;
			
	}
	public function setPort($port){
	$this->Port = $port;
	}
	public function getPort()
	{
		return $this->Port;
	}
		
}
?>