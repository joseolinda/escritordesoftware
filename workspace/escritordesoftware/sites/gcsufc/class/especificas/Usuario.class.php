<?php

				/**
				* Classe feita para manipulação do objeto usuario
						* feita automaticamente com programa gerador de software inventado por
						* Autor Jefferson Uchôa Ponte
						*
						*
						*/
						class Usuario
						{

								
					private $Id;
							
					private $Nome;
							
					private $Login;
							
					private $Email;
							
					private $Senha;
							
					private $Nivel;
							
					private $Data;
							
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
										
									
						public function setLogin($login)
						{
						$this->Login = $login;

			}
								
					public function getLogin()
					{
							return $this->Login;
										
		}
										
									
						public function setEmail($email)
						{
						$this->Email = $email;

			}
								
					public function getEmail()
					{
							return $this->Email;
										
		}
										
									
						public function setSenha($senha)
						{
						$this->Senha = $senha;

			}
								
					public function getSenha()
					{
							return $this->Senha;
										
		}
										
									
						public function setNivel($nivel)
						{
						$this->Nivel = $nivel;

			}
								
					public function getNivel()
					{
							return $this->Nivel;
										
		}
										
									
						public function setData($data)
						{
						$this->Data = $data;

			}
								
					public function getData()
					{
							return $this->Data;
										
		}
										
									
	}
				?>