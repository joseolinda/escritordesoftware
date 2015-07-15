
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

			$instrucao->setRowData("titulo", $postagem->getTitulo());

		}
			
	
		if($postagem->getCorpo()!= null)
		{

			$instrucao->setRowData("corpo", $postagem->getCorpo());

		}
			
	
		if($postagem->getData()!= null)
		{

			$instrucao->setRowData("data", $postagem->getData());

		}
			
	
		if($postagem->getUsuario()!= null)
		{

			$instrucao->setRowData("usuario", $postagem->getUsuario());

		}
			
	
		if($postagem->getCaminhofoto()!= null)
		{

			$instrucao->setRowData("caminhofoto", $postagem->getCaminhofoto());

		}
			
	
		if($postagem->getHora()!= null)
		{

			$instrucao->setRowData("hora", $postagem->getHora());

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
		