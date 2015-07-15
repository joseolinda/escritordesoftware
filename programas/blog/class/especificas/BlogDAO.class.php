
<?php
				
class blogDAO
{

public $Conexao;
		
	public function __construct()
	{
				$this->Conexao = Conexao::retornaConexaoComBanco();	
	}

	public function inserir(Blog $blog)
	{
	
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("blog");
	
		


				if($blog->getTitulo() != null)
				{
							
					$instrucao->setRowData("titulo", $blog->getTitulo());
					
				}
				

				if($blog->getCorpo() != null)
				{
							
					$instrucao->setRowData("corpo", $blog->getCorpo());
					
				}
				
			if($this->Conexao->query($instrucao->getInstruction()))
			{
				echo 'Inserido com sucesso! ';
			}
			else
			{
				echo 'erro ';
				
			}
		
	}
}
								
?>