
<?php
		
/**
* Classe feita para manipulação do objeto PostagemDAO
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class PostagemDAO
{
	private $conexao;

	public function setConexao(PDO $conexao){
		$this->conexao = $conexao;
	
	}
	public function getConexao(){
		return $this->conexao;
	}
	public function inserir(Postagem $postagem ){
		//Objetivo deste metodo é inserir um objeto no banco, fazendo-o ter persistencia.
		//utilizaremos a abstracao do SQL da classe TsqlInstruction
		//1. Foreach dos atributos . PRa cada existencia de atributo é um valor a ser adicionado.
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("postagem");
			
			
			
	
		if($postagem->getId()!= null)
		{

			$instrucao->setRowData("id", $postagem->getId());

		}
			
	
		if($postagem->getTitulo()!= null)
		{

			$instrucao->setRowData("Titulo", $postagem->getTitulo());

		}
			
	
		if($postagem->getCorpo()!= null)
		{

			$instrucao->setRowData("Corpo", $postagem->getCorpo());

		}
			
	
		if($postagem->getAutor()!= null)
		{

			$instrucao->setRowData("Autor", $postagem->getAutor());

		}
			
	
		if($postagem->getJuyguygufuguyguyy5678()!= null)
		{

			$instrucao->setRowData("juyguygufuguyguyy5678", $postagem->getJuyguygufuguyguyy5678());

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
		