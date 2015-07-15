<?php

				/**
				* Classe feita para manipulação do objeto banco_de_dados
						* feita automaticamente com programa gerador de software inventado por
						* Autor Jefferson Uchôa Ponte
						*
						*
						*/
						class Banco_de_dados
						{

								
					private $Id;
							
					private $Nome;
							
					private $Senha;
							
					private $Port;
							
					private $Usuario;
							
					private $Host;
							
					private $Tipo;
							
						public function setId($id)
						{
						$this->Id = $id;

			}
								
					public function getId()
					{
							return $this->Id;
										
		}
										
									
						public function setNome($nome)
						{
						$this->Nome = $nome;

			}
								
					public function getNome()
					{
							return $this->Nome;
										
		}
										
									
						public function setSenha($senha)
						{
						$this->Senha = $senha;

			}
								
					public function getSenha()
					{
							return $this->Senha;
										
		}
										
									
						public function setPort($port)
						{
						$this->Port = $port;

			}
								
					public function getPort()
					{
							return $this->Port;
										
		}
										
									
						public function setUsuario($usuario)
						{
						$this->Usuario = $usuario;

			}
								
					public function getUsuario()
					{
							return $this->Usuario;
										
		}
										
									
						public function setHost($host)
						{
						$this->Host = $host;

			}
								
					public function getHost()
					{
							return $this->Host;
										
		}
										
									
						public function setTipo($tipo)
						{
						$this->Tipo = $tipo;

			}
								
					public function getTipo()
					{
							return $this->Tipo;
										
		}
										
									
	}
				?>