
<?php
		
/**
* Classe feita para manipulação do objeto CategoriaDAO
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class CategoriaDAO
{
	private $conexao;

	public function setConexao(PDO $conexao){
		$this->conexao = $conexao;
	
	}
	public function getConexao(){
		return $this->conexao;
	}
	public function inserir(Categoria $categoria ){
		//Objetivo deste metodo é inserir um objeto no banco, fazendo-o ter persistencia.
		//utilizaremos a abstracao do SQL da classe TsqlInstruction
		//1. Foreach dos atributos . PRa cada existencia de atributo é um valor a ser adicionado.
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("categoria");
			
			
			
	
		if($categoria->getId()!= null)
		{

			$instrucao->setRowData("id", $categoria->getId());

		}
			
	
		if($categoria->getNome()!= null)
		{

			$instrucao->setRowData("nome", $categoria->getNome());

		}
			
	
		if($categoria->getDescricao()!= null)
		{

			$instrucao->setRowData("descricao", $categoria->getDescricao());

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
		