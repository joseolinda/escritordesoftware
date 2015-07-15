
<?php
		
/**
* Classe feita para manipulação do objeto LivroDAO
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class LivroDAO
{
	private $conexao;

	public function setConexao(PDO $conexao){
		$this->conexao = $conexao;
	
	}
	public function getConexao(){
		return $this->conexao;
	}
	public function inserir(Livro $livro ){
		//Objetivo deste metodo é inserir um objeto no banco, fazendo-o ter persistencia.
		//utilizaremos a abstracao do SQL da classe TsqlInstruction
		//1. Foreach dos atributos . PRa cada existencia de atributo é um valor a ser adicionado.
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("livro");
			
			
			
	
		if($livro->getId()!= null)
		{

			$instrucao->setRowData("id", $livro->getId());

		}
			
	
		if($livro->getTitulo()!= null)
		{

			$instrucao->setRowData("titulo", $livro->getTitulo());

		}
			
	
		if($livro->getAutor()!= null)
		{

			$instrucao->setRowData("autor", $livro->getAutor());

		}
			
	
		if($livro->getData()!= null)
		{

			$instrucao->setRowData("data", $livro->getData());

		}
			
	
		if($livro->getHora()!= null)
		{

			$instrucao->setRowData("hora", $livro->getHora());

		}
			
	
		if($livro->getUsuario()!= null)
		{

			$instrucao->setRowData("usuario", $livro->getUsuario());

		}
			
	
		if($livro->getDescricao()!= null)
		{

			$instrucao->setRowData("descricao", $livro->getDescricao());

		}
			
	
		if($livro->getLink0()!= null)
		{

			$instrucao->setRowData("link0", $livro->getLink0());

		}
			
	
		if($livro->getLink1()!= null)
		{

			$instrucao->setRowData("link1", $livro->getLink1());

		}
			
	
		if($livro->getLink2()!= null)
		{

			$instrucao->setRowData("link2", $livro->getLink2());

		}
			
	
		if($livro->getVisibilidade()!= null)
		{

			$instrucao->setRowData("visibilidade", $livro->getVisibilidade());

		}
			
	
		if($livro->getCaminhofoto()!= null)
		{

			$instrucao->setRowData("caminhofoto", $livro->getCaminhofoto());

		}
			
	
		if($livro->getFdsifhsodfjos()!= null)
		{

			$instrucao->setRowData("fdsifhsodfjos", $livro->getFdsifhsodfjos());

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
		