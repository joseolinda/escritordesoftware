<?php


				class EnderecoDAO
				{
						public $Conexao;

						
				public function __construct()
				{
				$this->Conexao = Conexao::retornaConexaoComBanco();

	}

				
				public function inserir(Endereco $endereco)
				{
						


						if($endereco->getId() != null)
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
												$instrucao->setEntity("endereco");
															
			}

														

						if($endereco->getRua()!= null)
						{

								$instrucao->setRowData("rua", $endereco->getRua());

			}

										

						if($endereco->getNumero()!= null)
						{

								$instrucao->setRowData("numero", $endereco->getNumero());

			}

										

						if($endereco->getBairro()!= null)
						{

								$instrucao->setRowData("bairro", $endereco->getBairro());

			}

										
				echo $instrucao->getInstruction();

				if($this->Conexao->query($instrucao->getInstruction()))
				{

				echo 'Inserido com sucesso! ';
				if($endereco->getId() != null)
				{
						//O objeto tem id?
	}
						else
						{//Não? Então insira o id
						$endereco->setId($this->Conexao->lastInsertId());
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
				$sql->setEntity('endereco');
				
				
			
						 $instrucao = $sql->addColumn('id');

						 $instrucao = $sql->addColumn('rua');

						 $instrucao = $sql->addColumn('numero');

						 $instrucao = $sql->addColumn('bairro');

		
		$result = $this->Conexao->query($sql->getInstruction());
	
			return $result;
		}

	}
				?>