
<?php
				
class ObjetoDAO
{

public $Conexao;
		
	public function __construct()
	{
				$this->Conexao = Conexao::retornaConexaoComBanco();	
	}

	public function inserir(Objeto $objeto)
	{
	
			
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("objeto");
	
		


				if($objeto->getAtributos() != null)
				{
							
					$instrucao->setRowData("atributos", $objeto->getAtributos());
					
				}
				

				if($objeto->getPersistencia() != null)
				{
							
					$instrucao->setRowData("persistencia", $objeto->getPersistencia());
					
				}
				

				if($objeto->getDocumentacao() != null)
				{
							
					$instrucao->setRowData("documentacao", $objeto->getDocumentacao());
					
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
		$sql = "SELECT * FROM objeto ORDER BY id DESC";
		$result = $this->Conexao->query($sql);
		$x = 0;
		foreach($result as $linha)
		{
				$objeto = new Objeto;
						
				$objeto->setAtributos($linha['atributos']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$objeto->setPersistencia($linha['persistencia']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$objeto->setDocumentacao($linha['documentacao']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					
			
				
				$objetos[$x] = $objeto;
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