
<?php
		
/**
* Classe feita para manipulação do objeto ForumDAO
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class ForumDAO
{
	private $conexao;

	public function setConexao(PDO $conexao){
		$this->conexao = $conexao;
	
	}
	public function getConexao(){
		return $this->conexao;
	}
	public function inserir(Forum $forum ){
		//Objetivo deste metodo é inserir um objeto no banco, fazendo-o ter persistencia.
		//utilizaremos a abstracao do SQL da classe TsqlInstruction
		//1. Foreach dos atributos . PRa cada existencia de atributo é um valor a ser adicionado.
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("forum");
			
			
			
	
		if($forum->getId()!= null)
		{

			$instrucao->setRowData("id", $forum->getId());

		}
			
	
		if($forum->getTitulo()!= null)
		{

			$instrucao->setRowData("titulo", $forum->getTitulo());

		}
			
	
		if($forum->getCorpo()!= null)
		{

			$instrucao->setRowData("corpo", $forum->getCorpo());

		}
			
	
		if($forum->getUsuario()!= null)
		{

			$instrucao->setRowData("usuario", $forum->getUsuario());

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
		