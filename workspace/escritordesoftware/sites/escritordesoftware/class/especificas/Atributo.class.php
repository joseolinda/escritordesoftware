<?php

				/**
				* Classe feita para manipulação do objeto atributo
						* feita automaticamente com programa gerador de software inventado por
						* Autor Jefferson Uchôa Ponte
						*
						*
						*/
						class Atributo
						{

								
					private $Id;
							
					private $Nome;
							
					private $Software;
							
					private $Banco_de_dados;
							
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
										
									
						public function setSoftware($software)
						{
						$this->Software = $software;

			}
								
					public function getSoftware()
					{
							return $this->Software;
										
		}
										
									
						public function setBanco_de_dados($banco_de_dados)
						{
						$this->Banco_de_dados = $banco_de_dados;

			}
								
					public function getBanco_de_dados()
					{
							return $this->Banco_de_dados;
										
		}
										
									
	}
				?>