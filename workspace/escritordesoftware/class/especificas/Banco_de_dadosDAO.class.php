
<?php
				
class Banco_de_dadosDAO
{

public $Conexao;
		
	public function __construct()
	{
				$this->Conexao = Conexao::retornaConexaoComBanco();	
	}

	public function inserir(Banco_de_dados $banco_de_dados)
	{
	
			
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("banco_de_dados");
	
		


				if($banco_de_dados->getNome() != null)
				{
							
					$instrucao->setRowData("nome", $banco_de_dados->getNome());
					
				}
				

				if($banco_de_dados->getHost() != null)
				{
							
					$instrucao->setRowData("host", $banco_de_dados->getHost());
					
				}
				

				if($banco_de_dados->getSenha() != null)
				{
							
					$instrucao->setRowData("senha", $banco_de_dados->getSenha());
					
				}
				

				if($banco_de_dados->getTipo() != null)
				{
							
					$instrucao->setRowData("tipo", $banco_de_dados->getTipo());
					
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
		$sql = "SELECT * FROM banco_de_dados ORDER BY id DESC";
		$result = $this->Conexao->query($sql);
		$x = 0;
		foreach($result as $linha)
		{
				$banco_de_dados = new Banco_de_dados;
						
				$banco_de_dados->setNome($linha['nome']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$banco_de_dados->setHost($linha['host']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$banco_de_dados->setSenha($linha['senha']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$banco_de_dados->setTipo($linha['tipo']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					
			
				
				$objetos[$x] = $banco_de_dados;
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