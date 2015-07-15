
<?php
		
/**
* Classe feita para manipulação do objeto UsuarioDAO
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class UsuarioDAO
{
	private $conexao;

	public function setConexao(PDO $conexao){
		$this->conexao = $conexao;
	
	}
	public function getConexao(){
		return $this->conexao;
	}
	public function inserir(Usuario $usuario ){
		//Objetivo deste metodo é inserir um objeto no banco, fazendo-o ter persistencia.
		//utilizaremos a abstracao do SQL da classe TsqlInstruction
		//1. Foreach dos atributos . PRa cada existencia de atributo é um valor a ser adicionado.
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("usuario");
			
			
			
	
		if($usuario->getId()!= null)
		{

			$instrucao->setRowData("id", $usuario->getId());

		}
			
	
		if($usuario->getNome()!= null)
		{

			$instrucao->setRowData("nome", $usuario->getNome());

		}
			
	
		if($usuario->getEmail()!= null)
		{

			$instrucao->setRowData("email", $usuario->getEmail());

		}
			
	
		if($usuario->getLogin()!= null)
		{

			$instrucao->setRowData("login", $usuario->getLogin());

		}
			
	
		if($usuario->getSenha()!= null)
		{

			$instrucao->setRowData("senha", $usuario->getSenha());

		}
			
	
		if($usuario->getNivel()!= null)
		{

			$instrucao->setRowData("nivel", $usuario->getNivel());

		}
			
	
		if($usuario->getDatadecadastro()!= null)
		{

			$instrucao->setRowData("datadecadastro", $usuario->getDatadecadastro());

		}
			
	
		if($usuario->getHoradecadastro()!= null)
		{

			$instrucao->setRowData("horadecadastro", $usuario->getHoradecadastro());

		}

		echo $instrucao->getInstruction();

		if($this->Conexao->query($instrucao->getInstruction()))
		{
			return true;		
		}
		else
		{
			return false;
		}
		
		
	}
	public function deletar(){}
	public function alterar(){}
	
}
		