
<?php
/**
 * Inserir e recuperar objeto site do banco de dados
 * @author jefferson
 *
 */	
class SiteDAO
{

public $Conexao;
		
	public function __construct()
	{
				$this->Conexao = Conexao::retornaConexaoComBanco();	
	}

	public function inserir(Site $site)
	{
	
			
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("site");
	
		


				if($site->getSoftware() != null)
				{
							
					$instrucao->setRowData("software", $site->getSoftware());
					
				}
				

				if($site->getBanco_de_dados() != null)
				{
							
					$instrucao->setRowData("banco_de_dados", $site->getBanco_de_dados());
					
				}
				

				if($site->getPaginas() != null)
				{
							
					$instrucao->setRowData("paginas", $site->getPaginas());
					
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
		$sql = "SELECT * FROM site ORDER BY id DESC";
		$result = $this->Conexao->query($sql);
		$x = 0;
		foreach($result as $linha)
		{
				$site = new Site;
						
				$site->setSoftware($linha['software']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$site->setBanco_de_dados($linha['banco_de_dados']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$site->setPaginas($linha['paginas']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					
			
				
				$objetos[$x] = $site;
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