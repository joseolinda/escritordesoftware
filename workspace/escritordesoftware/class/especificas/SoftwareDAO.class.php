<?php


class SoftwareDAO
{
	public $Conexao;


	public function __construct()
	{
		$this->Conexao = Conexao::retornaConexaoComBanco();

	}


	public function inserir(Software $software)
	{



		if($software->getId() != null)
		{
			$instrucao = new TSqlUpdate();
			$instrucao->setEntity("id");


			$criteria = new TCriteria();
			$criteria->add(new TFilter('id', '=', $Id->getId()));
			$instrucao->setCriteria($criteria);


		}
		else
		{

			$instrucao = new TSqlInsert();
			$instrucao->setEntity("software");

		}



		if($software->getNome()!= null)
		{

			$instrucao->setRowData("nome", $software->getNome());

		}



		echo $instrucao->getInstruction();


		if($this->Conexao->query($instrucao->getInstruction()))
		{

			echo 'Inserido com sucesso! ';
			if($software->getId() != null)
			{
				//O objeto tem id?
			}
			else
			{//Não? Então insira o id
				$software->setId($this->Conexao->lastInsertId());
			}
			//Agora pegaremos a lista de atributos que sao objetos
			//em cada um faremos o seguinte
			//Primeiro perguntamos se ele existe.
			//Precisa fazer um foreach aqui

			//Vamos redirecionar para a pagina de software.

			echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=software.php?software_id='.$software->getId().'">';
			
			



		}
		else
		{

			echo 'Erro! ';

		}
			



	}//fecha metodo inserir
	public function retornaLista()
	{

		$sql = new TSqlSelect();
		$sql->setEntity('software');

		$instrucao = $sql->addColumn('id_software');
		$instrucao = $sql->addColumn('nome');

		echo $sql->getInstruction();
		$result = $this->Conexao->query($sql->getInstruction());

		return $result;
	}
	public function retornaSoftware(Software $software){
		
		if($software->getId() != null){

		
			$conexao = $this->Conexao;

			$id = $software->getId();
			$sql = "SELECT 
			software.id_software, 
			software.nome as software_nome, 
			objeto.nome as objeto_nome, 
			objeto.id_objeto
			FROM software 
			LEFT JOIN objeto 
			ON software.id_software = objeto.id_software 
			WHERE software.id_software = $id";

			$result = $this->Conexao->query($sql);
			$n = 0;
			foreach ($result as $linha)
			{
				
				if($linha['objeto_nome'] != null)
				{
					$objeto = new Objeto();
					$objeto->setNome($linha['objeto_nome']);
					$objeto->setId($linha['id_objeto']);

					$objeto->setIdSoftware($linha['id_software']);
					
					$id_objeto = $objeto->getId();
					$sql_atributo = "SELECT * FROM atributo WHERE id_objeto = $id_objeto";
					$result_atributo = $conexao->query($sql_atributo);
					$n_atributo = 0;
					foreach ($result_atributo as $linha_atributo)
					{
						
						$atributo = new Atributo();
						$atributo->setId($linha_atributo['id_atributo']);
						$atributo->setNome($linha_atributo['nome']);
						$atributo->setTipo($linha_atributo['tipo']);
						
						$arrayDeAtributos[$n_atributo] = $atributo;
						
						$n_atributo++;
					}
					
					if(isset($arrayDeAtributos))
					{
						$objeto->setArray_de_atributos($arrayDeAtributos);
					}
					
					$arrayObjeto[$n] = $objeto;
					
					$n++;
					
					
				}
				$software->setNome($linha['software_nome']);

			}

			
			if(isset($arrayObjeto)){
				$software->setArrayDeObjetos($arrayObjeto);
				
			}

		}
		return $software;

	}

}
?>