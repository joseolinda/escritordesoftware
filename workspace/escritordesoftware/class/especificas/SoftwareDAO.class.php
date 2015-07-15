
<?php
				
class SoftwareDAO
{

public $Conexao;
		
	public function __construct()
	{
				$this->Conexao = Conexao::retornaConexaoComBanco();	
	}

	public function inserir(Software $software)
	{
	
			
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("software");
	
		


				if($software->getNome() != null)
				{
							
					$instrucao->setRowData("nome", $software->getNome());
					
				}
				

				if($software->getObjetos() != null)
				{
							
					$instrucao->setRowData("objetos", $software->getObjetos());
					
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
		$sql = "SELECT * FROM software ORDER BY id DESC";
		$result = $this->Conexao->query($sql);
		$x = 0;
		foreach($result as $linha)
		{
				$software = new Software;
						
				$software->setNome($linha['nome']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$software->setObjetos($linha['objetos']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					
			
				
				$objetos[$x] = $software;
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