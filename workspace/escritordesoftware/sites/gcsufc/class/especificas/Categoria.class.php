<?php

				/**
				* Classe feita para manipulação do objeto categoria
						* feita automaticamente com programa gerador de software inventado por
						* Autor Jefferson Uchôa Ponte
						*
						*
						*/
						class Categoria
						{

								
					private $Id;
							
					private $Nome;
							
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
										
									
	}
				?>