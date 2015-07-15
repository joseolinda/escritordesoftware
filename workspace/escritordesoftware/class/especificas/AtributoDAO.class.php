<?php


class AtributoDAO
{
	public $Conexao;


	public function __construct()
	{
		$this->Conexao = Conexao::retornaConexaoComBanco();

	}


	public function inserir(Atributo $atributo)
	{



		if($atributo->getId() != null)
		{
			$instrucao = new TSqlUpdate();
			$instrucao->setEntity("id_atributo");
				
				
			$criteria = new TCriteria();
			$criteria->add(new TFilter('id_atributo', '=', $Id->getId()));
			$instrucao->setCriteria($criteria);


		}
		else
		{

			$instrucao = new TSqlInsert();
			$instrucao->setEntity("atributo");
				
		}



		if($atributo->getNome()!= null)
		{

			$instrucao->setRowData("nome", $atributo->getNome());

		}



		if($atributo->getId_objeto() != null)
		{

			$instrucao->setRowData("id_objeto", $atributo->getId_objeto());

		}



		if($atributo->getTamanho() != null)
		{

			$instrucao->setRowData("tamanho", $atributo->getTamanho());

		}
		if($atributo->getTipo() != null)
		{		
			$instrucao->setRowData("tipo", $atributo->getTipo());		
		}


		echo $instrucao->getInstruction();

		if($this->Conexao->query($instrucao->getInstruction()))
		{

			echo 'Inserido com sucesso! ';
			if($atributo->getId() != null)
			{
				//O objeto tem id?
			}
			else
			{//Não? Então insira o id
				$atributo->setId($this->Conexao->lastInsertId());
			}
			//Agora pegaremos a lista de atributos que sao objetos
			//em cada um faremos o seguinte
			//Primeiro perguntamos se ele existe.
			//Precisa fazer um foreach aqui




		}
		else
		{

			echo 'Erro! ';

		}
			



	}//fecha metodo inserir
	public function retornaLista()
	{

		$sql = new TSqlSelect();
		$sql->setEntity('atributo');


			
		$instrucao = $sql->addColumn('id');

		$instrucao = $sql->addColumn('nome');

		$instrucao = $sql->addColumn('software');

		$instrucao = $sql->addColumn('banco_de_dados');


		$result = $this->Conexao->query($sql->getInstruction());

		return $result;
	}

}
?>