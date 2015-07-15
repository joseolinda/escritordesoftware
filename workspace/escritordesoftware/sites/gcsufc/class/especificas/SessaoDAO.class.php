<?php


				class SessaoDAO
				{
						public $Conexao;

						
				public function __construct()
				{
				$this->Conexao = Conexao::retornaConexaoComBanco();

	}

				
				public function inserir(Sessao $sessao)
				{
						
				echo $instrucao->getInstruction();

				if($this->Conexao->query($instrucao->getInstruction()))
				{

				echo 'Inserido com sucesso! ';
				if($sessao->getId() != null)
				{
						//O objeto tem id?
	}
						else
						{//Não? Então insira o id
						$sessao->setId($this->Conexao->lastInsertId());
	}
								//Agora pegaremos a lista de atributos que sao objetos
								//em cada um faremos o seguinte
								//Primeiro perguntamos se ele existe.
								//Precisa fazer um foreach aqui

						if($sessao->getUsuario() != null)
						{
								//O objeto existe?
							if($sessao->getUsuario()->getId() != null)
							{
								//O atributo id do objeto existe?
								//Sera atualizado

								$usuario = $sessao->getUsuario();
								$usuariodao = new UsuarioDAO();
								$usuariodao->inserir($usuario);
								$usuario_id = $Usuario->getId();
								$sessao_id = $sessao->getId();
								//Verificaremos se o relacionamento já existe
								$sql = "SELECT * FROM sessao_usuario WHERE sessao_id = $sessao_id  AND usuario_id = $usuario_id";
								$result = $this->Conexao->query($sql);
								$x = 0;
																							
																						foreach ($result as $linha)
																						{
																						$x = $x + 1;
			}
																						if($x == 0 )
																						{
																						//Nao. Insere relacionamento
																						$sql_insert = "INSERT INTO sessao_usuario(sessao_id, usuario_id)values($sessao_id, $usuario_id)";
																								if($this->Conexao->query($sql_insert))
																								{
																								echo '<br>relacionamento inserido';
																									
			}//if($this->Conexao->query($sql_insert))
																									
			}//if($x == 0 )
																									
																									
			}//if($sessao->getUsuario()->getId() != null)
					else
					{
					//O Atributo objeto nao tem ID, e agora?
					$sessao_id = $sessao->getId();
							$usuariodao = new UsuarioDAO();
									$usuariodao->inserir($sessao->getUsuario());
											$usuario_id = $usuariodao->Conexao->lastInsertId();
													$sql_insert = "INSERT INTO sessao_usuario(sessao_id, usuario_id)values($sessao_id, $usuario_id)";
															if($this->Conexao->query($sql_insert))
															{
															echo '<br>relacionamento inserido';

			}

																

			}

			}//if($sessao->getUsuario() != null)


						
					




	}
				else
				{

				echo 'Erro! ';

	}
					

				

	}//fecha metodo inserir
		public function retornaLista()
		{

				$sql = new TSqlSelect();
				$sql->setEntity('sessao');
				
				
			
		
		$result = $this->Conexao->query($sql->getInstruction());
	
			return $result;
		}

	}
				?>