<?php


				class SiteDAO
				{
						public $Conexao;

						
				public function __construct()
				{
				$this->Conexao = Conexao::retornaConexaoComBanco();

	}

				
				public function inserir(Site $site)
				{
						


						if($site->getId() != null)
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
												$instrucao->setEntity("site");
															
			}

														

						if($site->getNome()!= null)
						{

								$instrucao->setRowData("nome", $site->getNome());

			}

										

						if($site->getSoftware()!= null)
						{

								$instrucao->setRowData("software", $site->getSoftware());

			}

										

						if($site->getBanco_de_dados()!= null)
						{

								$instrucao->setRowData("banco_de_dados", $site->getBanco_de_dados());

			}

										
				echo $instrucao->getInstruction();

				if($this->Conexao->query($instrucao->getInstruction()))
				{

				echo 'Inserido com sucesso! ';
				if($site->getId() != null)
				{
						//O objeto tem id?
	}
						else
						{//Não? Então insira o id
						$site->setId($this->Conexao->lastInsertId());
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
				$sql->setEntity('site');
				
				
			
						 $instrucao = $sql->addColumn('id');

						 $instrucao = $sql->addColumn('nome');

						 $instrucao = $sql->addColumn('software');

						 $instrucao = $sql->addColumn('banco_de_dados');

		
		$result = $this->Conexao->query($sql->getInstruction());
	
			return $result;
		}

	}
				?>