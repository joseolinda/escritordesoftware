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

										

						if($software->getTipo()!= null)
						{

								$instrucao->setRowData("tipo", $software->getTipo());

			}

										

						if($software->getIndice()!= null)
						{

								$instrucao->setRowData("indice", $software->getIndice());

			}

										

						if($software->getAuto_increment()!= null)
						{

								$instrucao->setRowData("auto_increment", $software->getAuto_increment());

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

						 $instrucao = $sql->addColumn('tipo');

						 $instrucao = $sql->addColumn('indice');

						 $instrucao = $sql->addColumn('auto_increment');

		
		$result = $this->Conexao->query($sql->getInstruction());
	
			return $result;
		}

	}
				?>