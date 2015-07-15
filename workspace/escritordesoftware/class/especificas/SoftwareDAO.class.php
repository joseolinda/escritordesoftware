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
	/**
	 * a partir de um objeto software que só possui o Id, nós 
	 * retornaremos o mesmo objeto com todo o seu conteúdo 
	 * armazenado em banco de dados
	 * 
	 * @param Software $software
	 * @return Software
	 */
	public function retornaSoftware(Software $software){
		
		if($software->getId() != null)
		{

			$conexao = $this->Conexao;
			$id = $software->getId();
			$sql = "
					SELECT 
					software.id_software, 
					software.nome as software_nome 
					FROM software 
					WHERE software.id_software = $id";

			$result = $this->Conexao->query($sql);
			foreach ($result as $linha)
			{
				$software->setNome($linha['software_nome']);
				
				
			}
			//antes de retornar o software, iremos buscar seus objetos,
			
			$objetodao = new ObjetoDAO();
			$arraydeobjetos = $objetodao->retornaArrayDeObjetos($software);
			$software->setArrayDeObjetos($arraydeobjetos);
			 
			//colocar em um array, e setálos. Como faremos?
			//vamos delegar essa função à classe ObjetoDAO 

		}
		return $software;

	}

}
?>