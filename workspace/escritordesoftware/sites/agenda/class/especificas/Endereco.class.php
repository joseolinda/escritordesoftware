<?php

				/**
				* Classe feita para manipulação do objeto endereco
						* feita automaticamente com programa gerador de software inventado por
						* Autor Jefferson Uchôa Ponte
						*
						*
						*/
						class Endereco
						{

								
					private $Id;
							
					private $Rua;
							
					private $Numero;
							
					private $Bairro;
							
						public function setId($id)
						{
						$this->Id = $id;

			}
								
					public function getId()
					{
							return $this->Id;
										
		}
										
									
						public function setRua($rua)
						{
						$this->Rua = $rua;

			}
								
					public function getRua()
					{
							return $this->Rua;
										
		}
										
									
						public function setNumero($numero)
						{
						$this->Numero = $numero;

			}
								
					public function getNumero()
					{
							return $this->Numero;
										
		}
										
									
						public function setBairro($bairro)
						{
						$this->Bairro = $bairro;

			}
								
					public function getBairro()
					{
							return $this->Bairro;
										
		}
										
									
	}
				?>