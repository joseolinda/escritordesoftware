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



		if($banco_de_dados->getId() != null)
		{
			$instrucao = new TSqlUpdate();
			$instrucao->setEntity("id");
				
				
			$criteria = new TCriteria();
			$criteria->add(new TFilter('id', '=', $Id->getId()));
			$instrucao->setCriteria($criteria);


		}
		else
		{

			$instrucao = new TSqlInsert();
			$instrucao->setEntity("banco_de_dados");
				
		}



		if($banco_de_dados->getNome()!= null)
		{

			$instrucao->setRowData("nome", $banco_de_dados->getNome());

		}



		if($banco_de_dados->getSoftware()!= null)
		{

			$instrucao->setRowData("software", $banco_de_dados->getSoftware());

		}


		echo $instrucao->getInstruction();

		if($this->Conexao->query($instrucao->getInstruction()))
		{

			echo 'Inserido com sucesso! ';
			if($banco_de_dados->getId() != null)
			{
				//O objeto tem id?
			}
			else
			{//Não? Então insira o id
				$banco_de_dados->setId($this->Conexao->lastInsertId());
			}
			//Agora pegaremos a lista de atributos que sao objetos
			//em cada um faremos o seguinte
			//Primeiro perguntamos se ele existe.
			//Precisa fazer um foreach aqui

			if($banco_de_dados->getBanco_de_dados() != null)
			{
				//O objeto existe?
				if($banco_de_dados->getBanco_de_dados()->getId() != null)
				{
					//O atributo id do objeto existe?
					//Sera atualizado

					$banco_de_dados = $banco_de_dados->getBanco_de_dados();
					$banco_de_dadosdao = new Banco_de_dadosDAO();
					$banco_de_dadosdao->inserir($banco_de_dados);
					$banco_de_dados_id = $Banco_de_dados->getId();
					$banco_de_dados_id = $banco_de_dados->getId();
					//Verificaremos se o relacionamento já existe
					$sql = "SELECT * FROM banco_de_dados_banco_de_dados WHERE banco_de_dados_id = $banco_de_dados_id  AND banco_de_dados_id = $banco_de_dados_id";
					$result = $this->Conexao->query($sql);
					$x = 0;
						
					foreach ($result as $linha)
					{
						$x = $x + 1;
					}
					if($x == 0 )
					{
						//Nao. Insere relacionamento
						$sql_insert = "INSERT INTO banco_de_dados_banco_de_dados(banco_de_dados_id, banco_de_dados_id)values($banco_de_dados_id, $banco_de_dados_id)";
						if($this->Conexao->query($sql_insert))
						{
							echo '<br>relacionamento inserido';
								
						}//if($this->Conexao->query($sql_insert))
							
					}//if($x == 0 )
						
						
				}//if($banco_de_dados->getBanco_de_dados()->getId() != null)
				else
				{
					//O Atributo objeto nao tem ID, e agora?
					$banco_de_dados_id = $banco_de_dados->getId();
					$banco_de_dadosdao = new Banco_de_dadosDAO();
					$banco_de_dadosdao->inserir($banco_de_dados->getBanco_de_dados());
					$banco_de_dados_id = $banco_de_dadosdao->Conexao->lastInsertId();
					$sql_insert = "INSERT INTO banco_de_dados_banco_de_dados(banco_de_dados_id, banco_de_dados_id)values($banco_de_dados_id, $banco_de_dados_id)";
					if($this->Conexao->query($sql_insert))
					{
						echo '<br>relacionamento inserido';

					}



				}

			}//if($banco_de_dados->getBanco_de_dados() != null)



				




		}
		else
		{

			echo 'Erro! ';

		}
			



	}//fecha metodo inserir
	public function retornaLista()
	{

		$sql = new TSqlSelect();
		$sql->setEntity('banco_de_dados');


			
		$instrucao = $sql->addColumn('id');

		$instrucao = $sql->addColumn('nome');

		$instrucao = $sql->addColumn('software');


		$result = $this->Conexao->query($sql->getInstruction());

		return $result;
	}

}
?>