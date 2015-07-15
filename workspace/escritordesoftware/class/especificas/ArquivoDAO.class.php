<?php
				
class ArquivoDAO
{

public $Conexao;
		
	public function __construct()
	{
				$this->Conexao = Conexao::retornaConexaoComBanco();	
	}

	public function inserir(Arquivo $arquivo)
	{
	
			
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("arquivo");
	
		


				if($arquivo->getCaminho() != null)
				{
							
					$instrucao->setRowData("caminho", $arquivo->getCaminho());
					
				}
				

				

				if($arquivo->getConteudo() != null)
				{
							
					$instrucao->setRowData("conteudo", $arquivo->getConteudo());
					
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
	public function retornaObjetos()
	{
		$sql = "SELECT * FROM arquivo ORDER BY id DESC";
		$result = $this->Conexao->query($sql);
		$x = 0;
		foreach($result as $linha)
		{
				$arquivo = new Arquivo;
						
				$arquivo->setCaminho($linha['caminho']);
					//um vetor vai receber esse objeto em cada linha
					$arquivo->setNome($linha['nome']);
					$arquivo->setConteudo($linha['conteudo']);
					
			
				
				$objetos[$x] = $arquivo;
				$x = $x + 1;
				
		}
			if(isset($objetos))
			{
			return $objetos;
			}
			else
			{
			return false;
			}
	}
}
								
?>