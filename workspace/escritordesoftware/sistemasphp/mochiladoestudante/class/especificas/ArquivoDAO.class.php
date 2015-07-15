
<?php
		
/**
* Classe feita para manipulação do objeto ArquivoDAO
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class ArquivoDAO
{
	private $conexao;

	public function setConexao(PDO $conexao){
		$this->conexao = $conexao;
	
	}
	public function getConexao(){
		return $this->conexao;
	}
	public function inserir(Arquivo $arquivo ){
		//Objetivo deste metodo é inserir um objeto no banco, fazendo-o ter persistencia.
		//utilizaremos a abstracao do SQL da classe TsqlInstruction
		//1. Foreach dos atributos . PRa cada existencia de atributo é um valor a ser adicionado.
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("arquivo");
			
			
			
	
		if($arquivo->getId()!= null)
		{

			$instrucao->setRowData("id", $arquivo->getId());

		}
			
	
		if($arquivo->getDescricao()!= null)
		{

			$instrucao->setRowData("descricao", $arquivo->getDescricao());

		}
			
	
		if($arquivo->getTitulo()!= null)
		{

			$instrucao->setRowData("titulo", $arquivo->getTitulo());

		}
			
	
		if($arquivo->getDatadeenvio()!= null)
		{

			$instrucao->setRowData("datadeenvio", $arquivo->getDatadeenvio());

		}
			
	
		if($arquivo->getNomedoarquivo()!= null)
		{

			$instrucao->setRowData("nomedoarquivo", $arquivo->getNomedoarquivo());

		}
			
	
		if($arquivo->getUsuario()!= null)
		{

			$instrucao->setRowData("usuario", $arquivo->getUsuario());

		}
			
	
		if($arquivo->getCategoria()!= null)
		{

			$instrucao->setRowData("categoria", $arquivo->getCategoria());

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
		