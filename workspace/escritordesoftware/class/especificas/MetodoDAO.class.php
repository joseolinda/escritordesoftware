
<?php
				
class MetodoDAO
{

public $Conexao;
		
	public function __construct()
	{
				$this->Conexao = Conexao::retornaConexaoComBanco();	
	}

	public function inserir(Metodo $metodo)
	{
	
			
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("metodo");
	
		


				if($metodo->getAssinatura() != null)
				{
							
					$instrucao->setRowData("assinatura", $metodo->getAssinatura());
					
				}
				

				if($metodo->getDocumentacao() != null)
				{
							
					$instrucao->setRowData("documentacao", $metodo->getDocumentacao());
					
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
		$sql = "SELECT * FROM metodo ORDER BY id DESC";
		$result = $this->Conexao->query($sql);
		$x = 0;
		foreach($result as $linha)
		{
				$metodo = new Metodo;
						
				$metodo->setAssinatura($linha['assinatura']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$metodo->setDocumentacao($linha['documentacao']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					
			
				
				$objetos[$x] = $metodo;
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