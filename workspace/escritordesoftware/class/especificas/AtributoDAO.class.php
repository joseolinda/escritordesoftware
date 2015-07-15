
<?php
				
class AtributoDAO
{

public $Conexao;
		
	public function __construct()
	{
				$this->Conexao = Conexao::retornaConexaoComBanco();	
	}

	public function inserir(Atributo $atributo)
	{
	
			
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("atributo");
	
		


				if($atributo->getNome() != null)
				{
							
					$instrucao->setRowData("nome", $atributo->getNome());
					
				}
				

				if($atributo->getTipo() != null)
				{
							
					$instrucao->setRowData("tipo", $atributo->getTipo());
					
				}
				

				if($atributo->getTamanho() != null)
				{
							
					$instrucao->setRowData("tamanho", $atributo->getTamanho());
					
				}
				

				if($atributo->getIndice() != null)
				{
							
					$instrucao->setRowData("indice", $atributo->getIndice());
					
				}
				

				if($atributo->getAuto_increment() != null)
				{
							
					$instrucao->setRowData("auto_increment", $atributo->getAuto_increment());
					
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
		$sql = "SELECT * FROM atributo ORDER BY id DESC";
		$result = $this->Conexao->query($sql);
		$x = 0;
		foreach($result as $linha)
		{
				$atributo = new Atributo;
						
				$atributo->setNome($linha['nome']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$atributo->setTipo($linha['tipo']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$atributo->setTamanho($linha['tamanho']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$atributo->setIndice($linha['indice']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					$atributo->setAuto_increment($linha['auto_increment']);
					//um vetor vai receber esse objeto em cada linha
					
					
					
					
			
				
				$objetos[$x] = $atributo;
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