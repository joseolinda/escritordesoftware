<?php


				class UsuarioDAO
				{
						public $Conexao;

						
				public function __construct()
				{
				$this->Conexao = Conexao::retornaConexaoComBanco();

	}

				
				public function inserir(Usuario $usuario)
				{
						


						if($usuario->getId() != null)
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
												$instrucao->setEntity("usuario");
															
			}

														

						if($usuario->getNome()!= null)
						{

								$instrucao->setRowData("nome", $usuario->getNome());

			}

										

						if($usuario->getLogin()!= null)
						{

								$instrucao->setRowData("login", $usuario->getLogin());

			}

										

						if($usuario->getEmail()!= null)
						{

								$instrucao->setRowData("email", $usuario->getEmail());

			}

										

						if($usuario->getSenha()!= null)
						{

								$instrucao->setRowData("senha", $usuario->getSenha());

			}

										

						if($usuario->getNivel()!= null)
						{

								$instrucao->setRowData("nivel", $usuario->getNivel());

			}

										

						if($usuario->getData()!= null)
						{

								$instrucao->setRowData("data", $usuario->getData());

			}

										
				echo $instrucao->getInstruction();

				if($this->Conexao->query($instrucao->getInstruction()))
				{

				echo 'Inserido com sucesso! ';
				if($usuario->getId() != null)
				{
						//O objeto tem id?
	}
						else
						{//Não? Então insira o id
						$usuario->setId($this->Conexao->lastInsertId());
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
				$sql->setEntity('usuario');
				
				
			
						 $instrucao = $sql->addColumn('id');

						 $instrucao = $sql->addColumn('nome');

						 $instrucao = $sql->addColumn('login');

						 $instrucao = $sql->addColumn('email');

						 $instrucao = $sql->addColumn('senha');

						 $instrucao = $sql->addColumn('nivel');

						 $instrucao = $sql->addColumn('data');

		
		$result = $this->Conexao->query($sql->getInstruction());
	
			return $result;
		}

	}
				?>