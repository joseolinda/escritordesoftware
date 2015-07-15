<?php

				/**
				* Classe feita para manipulação do objeto software
						* feita automaticamente com programa gerador de software inventado por
						* Autor Jefferson Uchôa Ponte
						*
						*
						*/
						class Software
						{

								
					private $Id;
							
					private $Nome;
							
					private $Tipo;
							
					private $Indice;
							
					private $Auto_increment;
							
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
										
									
						public function setTipo($tipo)
						{
						$this->Tipo = $tipo;

			}
								
					public function getTipo()
					{
							return $this->Tipo;
										
		}
										
									
						public function setIndice($indice)
						{
						$this->Indice = $indice;

			}
								
					public function getIndice()
					{
							return $this->Indice;
										
		}
										
									
						public function setAuto_increment($auto_increment)
						{
						$this->Auto_increment = $auto_increment;

			}
								
					public function getAuto_increment()
					{
							return $this->Auto_increment;
										
		}
										
									
	}
				?>