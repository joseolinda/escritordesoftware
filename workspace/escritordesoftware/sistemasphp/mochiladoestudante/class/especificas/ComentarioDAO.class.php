
<?php
		
/**
* Classe feita para manipulação do objeto ComentarioDAO
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class ComentarioDAO
{
	private $conexao;

	public function setConexao(PDO $conexao){
		$this->conexao = $conexao;
	
	}
	public function getConexao(){
		return $this->conexao;
	}
	public function inserir(Comentario $comentario ){
		//Objetivo deste metodo é inserir um objeto no banco, fazendo-o ter persistencia.
		//utilizaremos a abstracao do SQL da classe TsqlInstruction
		//1. Foreach dos atributos . PRa cada existencia de atributo é um valor a ser adicionado.
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("comentario");
			
			
			
	
		if($comentario->getId()!= null)
		{

			$instrucao->setRowData("id", $comentario->getId());

		}
			
	
		if($comentario->getTexto()!= null)
		{

			$instrucao->setRowData("texto", $comentario->getTexto());

		}
			
	
		if($comentario->getUsuario()!= null)
		{

			$instrucao->setRowData("usuario", $comentario->getUsuario());

		}
			
	
		if($comentario->getArquivo()!= null)
		{

			$instrucao->setRowData("arquivo", $comentario->getArquivo());

		}
			
	
		if($comentario->getData()!= null)
		{

			$instrucao->setRowData("data", $comentario->getData());

		}
			
	
		if($comentario->getHora()!= null)
		{

			$instrucao->setRowData("hora", $comentario->getHora());

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
		