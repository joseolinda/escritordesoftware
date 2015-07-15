
<?php
				
class PaginaDAO
{

public $Conexao;
		
	public function __construct()
	{
				$this->Conexao = Conexao::retornaConexaoComBanco();	
	}

	public function inserir(Pagina $pagina)
	{
	
			
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("pagina");
	
		


				if($pagina->getNome() != null)
				{
							
					$instrucao->setRowData("nome", $pagina->getNome());
					
				}
				

				if($pagina->getObjeto() != null)
				{
							
					$instrucao->setRowData("objeto", $pagina->getObjeto());
					
				}
				

				if($pagina->getAtividade() != null)
				{
							
					$instrucao->setRowData("atividade", $pagina->getAtividade());
					
				}
				

				if($pagina->getConteudo_anterior() != null)
				{
							
					$instrucao->setRowData("conteudo_anterior", $pagina->getConteudo_anterior());
					
				}
				

				if($pagina->getConteudo_posterior() != null)
				{
							
					$instrucao->setRowData("conteudo_posterior", $pagina->getConteudo_posterior());
					
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
		$sql = "SELECT * FROM pagina ORDER BY id DESC";
		$result = $this->Conexao->query($sql);
		$x = 0;
		foreach($result as $linha)
		{
				$pagina = new Pagina;
						
				$pagina->setNome($linha['nome']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$pagina->setObjeto($linha['objeto']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$pagina->setAtividade($linha['atividade']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$pagina->setConteudo_anterior($linha['conteudo_anterior']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$pagina->setConteudo_posterior($linha['conteudo_posterior']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					
			
				
				$objetos[$x] = $pagina;
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