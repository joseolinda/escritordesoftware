<?php


				class LivroDAO
				{
						public $Conexao;

						
				public function __construct()
				{
				$this->Conexao = Conexao::retornaConexaoComBanco();

	}

				
				public function inserir(Livro $livro)
				{
						


						if($livro->getId() != null)
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
												$instrucao->setEntity("livro");
															
			}

														

						if($livro->getReferencia()!= null)
						{

								$instrucao->setRowData("referencia", $livro->getReferencia());

			}

										

						if($livro->getTitulo()!= null)
						{

								$instrucao->setRowData("titulo", $livro->getTitulo());

			}

										

						if($livro->getDescricao()!= null)
						{

								$instrucao->setRowData("descricao", $livro->getDescricao());

			}

										

						if($livro->getCaminho_foto()!= null)
						{

								$instrucao->setRowData("caminho_foto", $livro->getCaminho_foto());

			}

										

						if($livro->getLink_de_download()!= null)
						{

								$instrucao->setRowData("link_de_download", $livro->getLink_de_download());

			}

										
				echo $instrucao->getInstruction();

				if($this->Conexao->query($instrucao->getInstruction()))
				{

				echo 'Inserido com sucesso! ';
				if($livro->getId() != null)
				{
						//O objeto tem id?
	}
						else
						{//Não? Então insira o id
						$livro->setId($this->Conexao->lastInsertId());
	}
								//Agora pegaremos a lista de atributos que sao objetos
								//em cada um faremos o seguinte
								//Primeiro perguntamos se ele existe.
								//Precisa fazer um foreach aqui

						if($livro->getAutor() != null)
						{
								//O objeto existe?
							if($livro->getAutor()->getId() != null)
							{
								//O atributo id do objeto existe?
								//Sera atualizado

								$autor = $livro->getAutor();
								$autordao = new AutorDAO();
								$autordao->inserir($autor);
								$autor_id = $Autor->getId();
								$livro_id = $livro->getId();
								//Verificaremos se o relacionamento já existe
								$sql = "SELECT * FROM livro_autor WHERE livro_id = $livro_id  AND autor_id = $autor_id";
								$result = $this->Conexao->query($sql);
								$x = 0;
																							
																						foreach ($result as $linha)
																						{
																						$x = $x + 1;
			}
																						if($x == 0 )
																						{
																						//Nao. Insere relacionamento
																						$sql_insert = "INSERT INTO livro_autor(livro_id, autor_id)values($livro_id, $autor_id)";
																								if($this->Conexao->query($sql_insert))
																								{
																								echo '<br>relacionamento inserido';
																									
			}//if($this->Conexao->query($sql_insert))
																									
			}//if($x == 0 )
																									
																									
			}//if($livro->getAutor()->getId() != null)
					else
					{
					//O Atributo objeto nao tem ID, e agora?
					$livro_id = $livro->getId();
							$autordao = new AutorDAO();
									$autordao->inserir($livro->getAutor());
											$autor_id = $autordao->Conexao->lastInsertId();
													$sql_insert = "INSERT INTO livro_autor(livro_id, autor_id)values($livro_id, $autor_id)";
															if($this->Conexao->query($sql_insert))
															{
															echo '<br>relacionamento inserido';

			}

																

			}

			}//if($livro->getAutor() != null)


						
					

						if($livro->getCategoria() != null)
						{
								//O objeto existe?
							if($livro->getCategoria()->getId() != null)
							{
								//O atributo id do objeto existe?
								//Sera atualizado

								$categoria = $livro->getCategoria();
								$categoriadao = new CategoriaDAO();
								$categoriadao->inserir($categoria);
								$categoria_id = $Categoria->getId();
								$livro_id = $livro->getId();
								//Verificaremos se o relacionamento já existe
								$sql = "SELECT * FROM livro_categoria WHERE livro_id = $livro_id  AND categoria_id = $categoria_id";
								$result = $this->Conexao->query($sql);
								$x = 0;
																							
																						foreach ($result as $linha)
																						{
																						$x = $x + 1;
			}
																						if($x == 0 )
																						{
																						//Nao. Insere relacionamento
																						$sql_insert = "INSERT INTO livro_categoria(livro_id, categoria_id)values($livro_id, $categoria_id)";
																								if($this->Conexao->query($sql_insert))
																								{
																								echo '<br>relacionamento inserido';
																									
			}//if($this->Conexao->query($sql_insert))
																									
			}//if($x == 0 )
																									
																									
			}//if($livro->getCategoria()->getId() != null)
					else
					{
					//O Atributo objeto nao tem ID, e agora?
					$livro_id = $livro->getId();
							$categoriadao = new CategoriaDAO();
									$categoriadao->inserir($livro->getCategoria());
											$categoria_id = $categoriadao->Conexao->lastInsertId();
													$sql_insert = "INSERT INTO livro_categoria(livro_id, categoria_id)values($livro_id, $categoria_id)";
															if($this->Conexao->query($sql_insert))
															{
															echo '<br>relacionamento inserido';

			}

																

			}

			}//if($livro->getCategoria() != null)


						
					




	}
				else
				{

				echo 'Erro! ';

	}
					

				

	}//fecha metodo inserir
		public function retornaLista()
		{

				$sql = new TSqlSelect();
				$sql->setEntity('livro');
				
				
			
						 $instrucao = $sql->addColumn('id');

						 $instrucao = $sql->addColumn('referencia');

						 $instrucao = $sql->addColumn('titulo');

						 $instrucao = $sql->addColumn('descricao');

						 $instrucao = $sql->addColumn('caminho_foto');

						 $instrucao = $sql->addColumn('link_de_download');

		
		$result = $this->Conexao->query($sql->getInstruction());
	
			return $result;
		}

	}
				?>