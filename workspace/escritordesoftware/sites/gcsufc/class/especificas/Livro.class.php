<?php

				/**
				* Classe feita para manipulação do objeto livro
						* feita automaticamente com programa gerador de software inventado por
						* Autor Jefferson Uchôa Ponte
						*
						*
						*/
						class Livro
						{

								
					private $Id;
							
					private $Referencia;
							
					private $Autor;
							
					private $Titulo;
							
					private $Categoria;
							
					private $Descricao;
							
					private $Caminho_foto;
							
					private $Link_de_download;
							
						public function setId($id)
						{
						$this->Id = $id;

			}
								
					public function getId()
					{
							return $this->Id;
										
		}
										
									
						public function setReferencia($referencia)
						{
						$this->Referencia = $referencia;

			}
								
					public function getReferencia()
					{
							return $this->Referencia;
										
		}
										
									
						public function setAutor(Autor $autor)
						{
						$this->Autor = $autor;

			}
								
					public function getAutor()
					{
							return $this->Autor;
										
		}
										
									
						public function setTitulo($titulo)
						{
						$this->Titulo = $titulo;

			}
								
					public function getTitulo()
					{
							return $this->Titulo;
										
		}
										
									
						public function setCategoria(Categoria $categoria)
						{
						$this->Categoria = $categoria;

			}
								
					public function getCategoria()
					{
							return $this->Categoria;
										
		}
										
									
						public function setDescricao($descricao)
						{
						$this->Descricao = $descricao;

			}
								
					public function getDescricao()
					{
							return $this->Descricao;
										
		}
										
									
						public function setCaminho_foto($caminho_foto)
						{
						$this->Caminho_foto = $caminho_foto;

			}
								
					public function getCaminho_foto()
					{
							return $this->Caminho_foto;
										
		}
										
									
						public function setLink_de_download($link_de_download)
						{
						$this->Link_de_download = $link_de_download;

			}
								
					public function getLink_de_download()
					{
							return $this->Link_de_download;
										
		}
										
									
	}
				?>