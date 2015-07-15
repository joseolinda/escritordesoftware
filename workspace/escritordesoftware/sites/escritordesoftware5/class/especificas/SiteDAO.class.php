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

						if($site->getSoftware() != null)
						{
								//O objeto existe?
							if($site->getSoftware()->getId() != null)
							{
								//O atributo id do objeto existe?
								//Sera atualizado

								$software = $site->getSoftware();
								$softwaredao = new SoftwareDAO();
								$softwaredao->inserir($software);
								$software_id = $Software->getId();
								$site_id = $site->getId();
								//Verificaremos se o relacionamento já existe
								$sql = "SELECT * FROM site_software WHERE site_id = $site_id  AND software_id = $software_id";
								$result = $this->Conexao->query($sql);
								$x = 0;
																							
																						foreach ($result as $linha)
																						{
																						$x = $x + 1;
			}
																						if($x == 0 )
																						{
																						//Nao. Insere relacionamento
																						$sql_insert = "INSERT INTO site_software(site_id, software_id)values($site_id, $software_id)";
																								if($this->Conexao->query($sql_insert))
																								{
																								echo '<br>relacionamento inserido';
																									
			}//if($this->Conexao->query($sql_insert))
																									
			}//if($x == 0 )
																									
																									
			}//if($site->getSoftware()->getId() != null)
					else
					{
					//O Atributo objeto nao tem ID, e agora?
					$site_id = $site->getId();
							$softwaredao = new SoftwareDAO();
									$softwaredao->inserir($site->getSoftware());
											$software_id = $softwaredao->Conexao->lastInsertId();
													$sql_insert = "INSERT INTO site_software(site_id, software_id)values($site_id, $software_id)";
															if($this->Conexao->query($sql_insert))
															{
															echo '<br>relacionamento inserido';

			}

																

			}

			}//if($site->getSoftware() != null)


						
					

						if($site->getBanco_de_dados() != null)
						{
								//O objeto existe?
							if($site->getBanco_de_dados()->getId() != null)
							{
								//O atributo id do objeto existe?
								//Sera atualizado

								$banco_de_dados = $site->getBanco_de_dados();
								$banco_de_dadosdao = new Banco_de_dadosDAO();
								$banco_de_dadosdao->inserir($banco_de_dados);
								$banco_de_dados_id = $Banco_de_dados->getId();
								$site_id = $site->getId();
								//Verificaremos se o relacionamento já existe
								$sql = "SELECT * FROM site_banco_de_dados WHERE site_id = $site_id  AND banco_de_dados_id = $banco_de_dados_id";
								$result = $this->Conexao->query($sql);
								$x = 0;
																							
																						foreach ($result as $linha)
																						{
																						$x = $x + 1;
			}
																						if($x == 0 )
																						{
																						//Nao. Insere relacionamento
																						$sql_insert = "INSERT INTO site_banco_de_dados(site_id, banco_de_dados_id)values($site_id, $banco_de_dados_id)";
																								if($this->Conexao->query($sql_insert))
																								{
																								echo '<br>relacionamento inserido';
																									
			}//if($this->Conexao->query($sql_insert))
																									
			}//if($x == 0 )
																									
																									
			}//if($site->getBanco_de_dados()->getId() != null)
					else
					{
					//O Atributo objeto nao tem ID, e agora?
					$site_id = $site->getId();
							$banco_de_dadosdao = new Banco_de_dadosDAO();
									$banco_de_dadosdao->inserir($site->getBanco_de_dados());
											$banco_de_dados_id = $banco_de_dadosdao->Conexao->lastInsertId();
													$sql_insert = "INSERT INTO site_banco_de_dados(site_id, banco_de_dados_id)values($site_id, $banco_de_dados_id)";
															if($this->Conexao->query($sql_insert))
															{
															echo '<br>relacionamento inserido';

			}

																

			}

			}//if($site->getBanco_de_dados() != null)


						
					




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

		
		$result = $this->Conexao->query($sql->getInstruction());
	
			return $result;
		}

	}
				?>