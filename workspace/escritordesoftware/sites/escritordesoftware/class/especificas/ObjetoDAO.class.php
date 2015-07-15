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
						


						if($objeto->getId() != null)
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
												$instrucao->setEntity("objeto");
															
			}

														

						if($objeto->getNome()!= null)
						{

								$instrucao->setRowData("nome", $objeto->getNome());

			}

										

						if($objeto->getSoftware()!= null)
						{

								$instrucao->setRowData("software", $objeto->getSoftware());

			}

										

						if($objeto->getBanco_de_dados()!= null)
						{

								$instrucao->setRowData("banco_de_dados", $objeto->getBanco_de_dados());

			}

										
				echo $instrucao->getInstruction();

				if($this->Conexao->query($instrucao->getInstruction()))
				{

				echo 'Inserido com sucesso! ';
				if($objeto->getId() != null)
				{
						//O objeto tem id?
	}
						else
						{//Não? Então insira o id
						$objeto->setId($this->Conexao->lastInsertId());
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
				$sql->setEntity('objeto');
				
				
			
						 $instrucao = $sql->addColumn('id');

						 $instrucao = $sql->addColumn('nome');

						 $instrucao = $sql->addColumn('software');

						 $instrucao = $sql->addColumn('banco_de_dados');

		
		$result = $this->Conexao->query($sql->getInstruction());
	
			return $result;
		}

	}
				?>