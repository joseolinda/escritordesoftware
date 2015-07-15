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

										

						if($banco_de_dados->getSenha()!= null)
						{

								$instrucao->setRowData("senha", $banco_de_dados->getSenha());

			}

										

						if($banco_de_dados->getPort()!= null)
						{

								$instrucao->setRowData("port", $banco_de_dados->getPort());

			}

										

						if($banco_de_dados->getUsuario()!= null)
						{

								$instrucao->setRowData("usuario", $banco_de_dados->getUsuario());

			}

										

						if($banco_de_dados->getHost()!= null)
						{

								$instrucao->setRowData("host", $banco_de_dados->getHost());

			}

										

						if($banco_de_dados->getTipo()!= null)
						{

								$instrucao->setRowData("tipo", $banco_de_dados->getTipo());

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

						 $instrucao = $sql->addColumn('senha');

						 $instrucao = $sql->addColumn('port');

						 $instrucao = $sql->addColumn('usuario');

						 $instrucao = $sql->addColumn('host');

						 $instrucao = $sql->addColumn('tipo');

		
		$result = $this->Conexao->query($sql->getInstruction());
	
			return $result;
		}

	}
				?>