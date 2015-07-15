
<?php
		
	/**
	* Classe feita para manipulação do objeto Pessoa
	* feita automaticamente com programa gerador de software inventado por
	* Autor Jefferson Uchôa Ponte
	*
	*
	*/
	class Pessoa
	{
		private $Id;

		private $Nome;

		private $Idade;

			public function setId(Id $id)
			{

				$this->Id = $id;
			
			}

			public function getId()
			{
				return $this->Id;
			
			}
			

			public function setNome(Nome $nome)
			{

				$this->Nome = $nome;
			
			}

			public function getNome()
			{
				return $this->Nome;
			
			}
			

			public function setIdade(Idade $idade)
			{

				$this->Idade = $idade;
			
			}

			public function getIdade()
			{
				return $this->Idade;
			
			}
			

		} //encerrando a classe
			?>