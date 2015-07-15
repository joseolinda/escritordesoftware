<?php


				class AutorDAO
				{
						public $Conexao;

						
				public function __construct()
				{
				$this->Conexao = Conexao::retornaConexaoComBanco();

	}

				
				public function inserir(Autor $autor)
				{
						


						if($autor->getId() != null)
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
												$instrucao->setEntity("autor");
															
			}

														

						if($autor->getNome()!= null)
						{

								$instrucao->setRowData("nome", $autor->getNome());

			}

										

						if($autor->getNome_completo()!= null)
						{

								$instrucao->setRowData("nome_completo", $autor->getNome_completo());

			}

										

						if($autor->getUltimo_nome()!= null)
						{

								$instrucao->setRowData("ultimo_nome", $autor->getUltimo_nome());

			}

										
				echo $instrucao->getInstruction();

				if($this->Conexao->query($instrucao->getInstruction()))
				{

				echo 'Inserido com sucesso! ';
				if($autor->getId() != null)
				{
						//O objeto tem id?
	}
						else
						{//Não? Então insira o id
						$autor->setId($this->Conexao->lastInsertId());
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
				$sql->setEntity('autor');
				
				
			
						 $instrucao = $sql->addColumn('id');

						 $instrucao = $sql->addColumn('nome');

						 $instrucao = $sql->addColumn('nome_completo');

						 $instrucao = $sql->addColumn('ultimo_nome');

		
		$result = $this->Conexao->query($sql->getInstruction());
	
			return $result;
		}

	}
				?>