<?php


				class BlogDAO
				{
						public $Conexao;

						
				public function __construct()
				{
				$this->Conexao = Conexao::retornaConexaoComBanco();

	}

				
				public function inserir(Blog $blog)
				{
						


						if($blog->getId() != null)
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
												$instrucao->setEntity("blog");
															
			}

														

						if($blog->getTitulo()!= null)
						{

								$instrucao->setRowData("titulo", $blog->getTitulo());

			}

										

						if($blog->getCorpo()!= null)
						{

								$instrucao->setRowData("corpo", $blog->getCorpo());

			}

										

						if($blog->getData()!= null)
						{

								$instrucao->setRowData("data", $blog->getData());

			}

										

						if($blog->getHora()!= null)
						{

								$instrucao->setRowData("hora", $blog->getHora());

			}

										
				echo $instrucao->getInstruction();

				if($this->Conexao->query($instrucao->getInstruction()))
				{

				echo 'Inserido com sucesso! ';
				if($blog->getId() != null)
				{
						//O objeto tem id?
	}
						else
						{//Não? Então insira o id
						$blog->setId($this->Conexao->lastInsertId());
	}
								//Agora pegaremos a lista de atributos que sao objetos
								//em cada um faremos o seguinte
								//Primeiro perguntamos se ele existe.
								//Precisa fazer um foreach aqui

						if($blog->getUsuario() != null)
						{
								//O objeto existe?
							if($blog->getUsuario()->getId() != null)
							{
								//O atributo id do objeto existe?
								//Sera atualizado

								$usuario = $blog->getUsuario();
								$usuariodao = new UsuarioDAO();
								$usuariodao->inserir($usuario);
								$usuario_id = $Usuario->getId();
								$blog_id = $blog->getId();
								//Verificaremos se o relacionamento já existe
								$sql = "SELECT * FROM blog_usuario WHERE blog_id = $blog_id  AND usuario_id = $usuario_id";
								$result = $this->Conexao->query($sql);
								$x = 0;
																							
																						foreach ($result as $linha)
																						{
																						$x = $x + 1;
			}
																						if($x == 0 )
																						{
																						//Nao. Insere relacionamento
																						$sql_insert = "INSERT INTO blog_usuario(blog_id, usuario_id)values($blog_id, $usuario_id)";
																								if($this->Conexao->query($sql_insert))
																								{
																								echo '<br>relacionamento inserido';
																									
			}//if($this->Conexao->query($sql_insert))
																									
			}//if($x == 0 )
																									
																									
			}//if($blog->getUsuario()->getId() != null)
					else
					{
					//O Atributo objeto nao tem ID, e agora?
					$blog_id = $blog->getId();
							$usuariodao = new UsuarioDAO();
									$usuariodao->inserir($blog->getUsuario());
											$usuario_id = $usuariodao->Conexao->lastInsertId();
													$sql_insert = "INSERT INTO blog_usuario(blog_id, usuario_id)values($blog_id, $usuario_id)";
															if($this->Conexao->query($sql_insert))
															{
															echo '<br>relacionamento inserido';

			}

																

			}

			}//if($blog->getUsuario() != null)


						
					

						if($blog->getCategoria() != null)
						{
								//O objeto existe?
							if($blog->getCategoria()->getId() != null)
							{
								//O atributo id do objeto existe?
								//Sera atualizado

								$categoria = $blog->getCategoria();
								$categoriadao = new CategoriaDAO();
								$categoriadao->inserir($categoria);
								$categoria_id = $Categoria->getId();
								$blog_id = $blog->getId();
								//Verificaremos se o relacionamento já existe
								$sql = "SELECT * FROM blog_categoria WHERE blog_id = $blog_id  AND categoria_id = $categoria_id";
								$result = $this->Conexao->query($sql);
								$x = 0;
																							
																						foreach ($result as $linha)
																						{
																						$x = $x + 1;
			}
																						if($x == 0 )
																						{
																						//Nao. Insere relacionamento
																						$sql_insert = "INSERT INTO blog_categoria(blog_id, categoria_id)values($blog_id, $categoria_id)";
																								if($this->Conexao->query($sql_insert))
																								{
																								echo '<br>relacionamento inserido';
																									
			}//if($this->Conexao->query($sql_insert))
																									
			}//if($x == 0 )
																									
																									
			}//if($blog->getCategoria()->getId() != null)
					else
					{
					//O Atributo objeto nao tem ID, e agora?
					$blog_id = $blog->getId();
							$categoriadao = new CategoriaDAO();
									$categoriadao->inserir($blog->getCategoria());
											$categoria_id = $categoriadao->Conexao->lastInsertId();
													$sql_insert = "INSERT INTO blog_categoria(blog_id, categoria_id)values($blog_id, $categoria_id)";
															if($this->Conexao->query($sql_insert))
															{
															echo '<br>relacionamento inserido';

			}

																

			}

			}//if($blog->getCategoria() != null)


						
					




	}
				else
				{

				echo 'Erro! ';

	}
					

				

	}//fecha metodo inserir
		public function retornaLista()
		{

				$sql = new TSqlSelect();
				$sql->setEntity('blog');
				
				
			
						 $instrucao = $sql->addColumn('id');

						 $instrucao = $sql->addColumn('titulo');

						 $instrucao = $sql->addColumn('corpo');

						 $instrucao = $sql->addColumn('data');

						 $instrucao = $sql->addColumn('hora');

		
		$result = $this->Conexao->query($sql->getInstruction());
	
			return $result;
		}

	}
				?>