<?php

				/**
				* Classe feita para manipulação do objeto blog
						* feita automaticamente com programa gerador de software inventado por
						* Autor Jefferson Uchôa Ponte
						*
						*
						*/
						class Blog
						{

								
					private $Id;
							
					private $Titulo;
							
					private $Corpo;
							
					private $Usuario;
							
					private $Categoria;
							
					private $Data;
							
					private $Hora;
							
						public function setId($id)
						{
						$this->Id = $id;

			}
								
					public function getId()
					{
							return $this->Id;
										
		}
										
									
						public function setTitulo($titulo)
						{
						$this->Titulo = $titulo;

			}
								
					public function getTitulo()
					{
							return $this->Titulo;
										
		}
										
									
						public function setCorpo($corpo)
						{
						$this->Corpo = $corpo;

			}
								
					public function getCorpo()
					{
							return $this->Corpo;
										
		}
										
									
						public function setUsuario(Usuario $usuario)
						{
						$this->Usuario = $usuario;

			}
								
					public function getUsuario()
					{
							return $this->Usuario;
										
		}
										
									
						public function setCategoria(Categoria $categoria)
						{
						$this->Categoria = $categoria;

			}
								
					public function getCategoria()
					{
							return $this->Categoria;
										
		}
										
									
						public function setData($data)
						{
						$this->Data = $data;

			}
								
					public function getData()
					{
							return $this->Data;
										
		}
										
									
						public function setHora($hora)
						{
						$this->Hora = $hora;

			}
								
					public function getHora()
					{
							return $this->Hora;
										
		}
										
									
	}
				?>