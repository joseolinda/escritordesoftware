<?php


				class CategoriaDAO
				{
						public $Conexao;

						
				public function __construct()
				{
				$this->Conexao = Conexao::retornaConexaoComBanco();

	}

				
				public function inserir(Categoria $categoria)
				{
						


						if($categoria->getId() != null)
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
												$instrucao->setEntity("categoria");
															
			}

														

						if($categoria->getNome()!= null)
						{

								$instrucao->setRowData("nome", $categoria->getNome());

			}

										
				echo $instrucao->getInstruction();

				if($this->Conexao->query($instrucao->getInstruction()))
				{

				echo 'Inserido com sucesso! ';
				if($categoria->getId() != null)
				{
						//O objeto tem id?
	}
						else
						{//Não? Então insira o id
						$categoria->setId($this->Conexao->lastInsertId());
	}
								//Agora pegaremos a lista de atributos que sao objetos
								//em cada um faremos o seguinte
								//Primeiro perguntamos se ele existe.
								//Precisa fazer um foreach aqui




	}
				else
				{

				echo 'Erro! ';

	}
					

				

	}//fecha metodo inserir
		public function retornaLista()
		{

				$sql = new TSqlSelect();
				$sql->setEntity('categoria');
				
				
			
						 $instrucao = $sql->addColumn('id');

						 $instrucao = $sql->addColumn('nome');

		
		$result = $this->Conexao->query($sql->getInstruction());
	
			return $result;
		}

	}
				?>