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
						


						if($software->getId() != null)
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
												$instrucao->setEntity("software");
															
			}

														

						if($software->getNome()!= null)
						{

								$instrucao->setRowData("nome", $software->getNome());

			}

										

						if($software->getSoftware()!= null)
						{

								$instrucao->setRowData("software", $software->getSoftware());

			}

										

						if($software->getBanco_de_dados()!= null)
						{

								$instrucao->setRowData("banco_de_dados", $software->getBanco_de_dados());

			}

										
				echo $instrucao->getInstruction();

				if($this->Conexao->query($instrucao->getInstruction()))
				{

				echo 'Inserido com sucesso! ';
				if($software->getId() != null)
				{
						//O objeto tem id?
	}
						else
						{//Não? Então insira o id
						$software->setId($this->Conexao->lastInsertId());
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
				$sql->setEntity('software');
				
				
			
						 $instrucao = $sql->addColumn('id');

						 $instrucao = $sql->addColumn('nome');

						 $instrucao = $sql->addColumn('software');

						 $instrucao = $sql->addColumn('banco_de_dados');

		
		$result = $this->Conexao->query($sql->getInstruction());
	
			return $result;
		}

	}
				?>