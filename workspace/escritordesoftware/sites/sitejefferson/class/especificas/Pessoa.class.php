<?php

				/**
				* Classe feita para manipulação do objeto pessoa
						* feita automaticamente com programa gerador de software inventado por
						* Autor Jefferson Uchôa Ponte
						*
						*
						*/
						class Pessoa
						{

								
					private $Id;
							
					private $Nome;
							
					private $Telefone;
							
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
										
									
						public function setTelefone($telefone)
						{
						$this->Telefone = $telefone;

			}
								
					public function getTelefone()
					{
							return $this->Telefone;
										
		}
										
									
	}
				?>