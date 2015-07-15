<?php


class ObjetoDAO
{
	public $Conexao;


	public function __construct()
	{
		$this->Conexao = Conexao::retornaConexaoComBanco();

	}


	public function inserir(Objeto $objeto)
	{

		if($objeto->getId() != null)
		{
			$instrucao = new TSqlUpdate();
			$instrucao->setEntity("id_objeto");
				
				
			$criteria = new TCriteria();
			$criteria->add(new TFilter('id_objeto', '=', $Id->getId()));
			$instrucao->setCriteria($criteria);


		}
		else
		{

			$instrucao = new TSqlInsert();
			$instrucao->setEntity("objeto");
				
		}



		if($objeto->getNome()!= null)
		{

			$instrucao->setRowData("nome", $objeto->getNome());

		}



		if($objeto->getIdSoftware()!= null)
		{

			$instrucao->setRowData("id_software", $objeto->getIdSoftware());

		}
		if($objeto->getPersistencia() != null){
			$instrucao->setRowData('persistencia', $objeto->getPersistencia());
		}else 
		{
			$instrucao->setRowData('persistencia', 0);
		}
		

		echo $instrucao->getInstruction();

		if($this->Conexao->query($instrucao->getInstruction()))
		{

			echo 'Inserido com sucesso! ';
			if($objeto->getId() != null)
			{
				//O objeto tem id?
			}
			else
			{//Não? Então insira o id
				$objeto->setId($this->Conexao->lastInsertId());
			}
			//Agora pegaremos a lista de atributos que sao objetos
			//em cada um faremos o seguinte
			//Primeiro perguntamos se ele existe.
			//Precisa fazer um foreach aqui
			if($objeto->getIdSoftware() != null){

			echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=software.php?software_id='.$objeto->getIdSoftware().'">';
			}



		}
		else
		{

			echo 'Erro! ';

		}
			



	}//fecha metodo inserir
	public function retornaLista()
	{

		$sql = new TSqlSelect();
		$sql->setEntity('objeto');


			
		$instrucao = $sql->addColumn('id');

		$instrucao = $sql->addColumn('nome');

		$instrucao = $sql->addColumn('software');

		$instrucao = $sql->addColumn('banco_de_dados');


		$result = $this->Conexao->query($sql->getInstruction());

		return $result;
	}
	public function retornaArrayDeObjetos(Software $software)
	{
		if($software->getId() != null)
		{
			$idDoSoftware = $software->getId();
			$sql = "SELECT 
					objeto.id_objeto, 
					objeto.nome as nome_objeto, 
					objeto.id_software, 
					objeto.persistencia
					FROM objeto 
					WHERE id_software =$idDoSoftware ";
			$result = $this->Conexao->query($sql);
			$n = 0;
			foreach ($result as $linha)
			{
				
				$objeto = new Objeto();
				$objeto->setId($linha['id_objeto']);
				$objeto->setNome($linha['nome_objeto']);
				$objeto->setIdSoftware($linha['id_software']);
				$objeto->setPersistencia($linha['persistencia']);
				$atributodao = new AtributoDAO();
				$arrayDeAtributos = $atributodao->retornaArrayDeAtributos($objeto);
				//Em cada linha iremos buscar o array de atributos
				$objeto->setArray_de_atributos($arrayDeAtributos);		
				
				$arrayDeObjetos[$n] = $objeto;
				$n++;
				
			}
			
			
		}
		if($n>0)
		{
		return $arrayDeObjetos;
		}
	}

}
?>