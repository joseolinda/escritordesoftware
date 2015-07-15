<?php


class SoftwareDAO{
	
	public $conexao;

	
	public function setConexao(PDO $conexao){
		$this->conexao = $conexao;
		
	}
	/**
	 * Serve para inserir nome, linguagem em uma tabela software, 
	 * retorna o id desta insersao
	 * @param Software $software
	 */
	public function inserir(Software $software){
		//Primeiro Passo - Inserir os dados basicos do software: nome e linguagem, pegando o Ultimo Id inserido.
		$nome = $software->getNome();
		$linguagem = $software->getLinguagem();
		$insert = "INSERT into software(nome, linguagem) values('$nome', '$linguagem')";
		if($this->conexao->query($insert)){
			//echo 'Software Inserido Com sucesso! -'. $insert;
			
			$sgdb = $software->getBancoDeDados()->getSistemaGerenciadorDeBancoDeDados();
			$host = $software->getBancoDeDados()->getHost();
			$pass = $software->getBancoDeDados()->getPass();
			$nomeDoBanco = $software->getBancoDeDados()->getNomeDoBanco();
			$idDoSoftware = $this->conexao->lastInsertId();
			
			
			
			//Segundo Passo - Inserir dados do BancoDeDados
			$insert2 = "INSERT into banco_de_dados
					(nome_do_banco, sistema_gerenciador_de_banco, host, pass, software_id_software) 
					values('$nomeDoBanco', '$sgdb', '$host', '$pass', $idDoSoftware)";
			
			if($this->conexao->query($insert2)){
				//echo '<br>Dados do banco inseridos com sucesso! '. $insert2;
				//Terceiro Passo - Retornar o ultimo ID do software inserido para quem fez a insersão.
				
				return $idDoSoftware;
			}else{
				//echo $insert2;
				echo 'Erro ao tentar inserir dados referente ao banco';
				return 0;
			}
			
			
		}
		else
		{
			echo 'Erro ao tentar inserir software'. $insert;
			return 0;
			
			
		}
		

		
		


		
		
	}
	public function retornaSoftwaresComId(){
		

		$sql = "SELECT * FROM software ORDER BY id_software DESC LIMIT 10";
		$result = $this->conexao->query($sql);
		foreach ($result as $linha)
		{
			
			
			$software = new Software();
			$software->setNome($linha['nome']);
			$software->setLinguagem($linha['linguagem']);
			$software->setId($linha['id_software']);
			$softwares[] = $software;
			
			
		}
		
		if(isset($softwares)){
			return $softwares;
		}else{
			return null;
		}
	}
	public function retornaSoftwareDetalhado(Software $software)
	{
		if($software->getId())
		{
			//Pega dados do software. 
			$idSoftware = $software->getId();
			$selectSoftware = "Select * From software Where id_software = $idSoftware";
			$result = $this->conexao->query($selectSoftware);
			foreach ($result as $linha)
			{
				
				$software->setLinguagem($linha['linguagem']);
				$software->setNome($linha['nome']);
				
			}

			//Buscaremos dados a respeito do banco de dados escolhido. 
			$selectBanco = "SELECT * FROM banco_de_dados WHERE software_id_software";
			$result = $this->conexao->query($selectBanco);
			$banco = new BancoDeDados();
			foreach ($result as $linha)
			{
				$banco->setSistemaGerenciadorDeBancoDeDados($linha['sistema_gerenciador_de_banco']);
				$banco->setNomeDoBanco($linha['nome_do_banco']);
				$banco->setHost($linha['host']);
				$banco->setPass($linha['pass']);
				$banco->setUsuario($linha['usuario']);
				
					
				
			}
			
			if($banco){
				$software->setBancoDeDados($banco);
			}
			
			//Pegaremos agora a lista de Objetos
			//Aqui também podemos buscar os atributos, mas implementarei isso daqui a pouco
			
			$selectObjetos = "SELECT * FROM objeto WHERE software_id_software = $idSoftware";
			$result = $this->conexao->query($selectObjetos);
			foreach ($result as $linha)
			{
				$objeto = new Objeto();
				$objeto->setNome($linha['nome']);
				$objeto->setPersistencia($linha['persistencia']);
				$objeto->setId($linha['id_objeto']);
				$idObjeto = $linha['id_objeto'];
				
				$selectAtributo = "SELECT * FROM atributo WHERE objeto_id_objeto = $idObjeto";
				$resultAtributo = $this->conexao->query($selectAtributo);
				foreach ($resultAtributo as $linhaatributo){
					$atributo = new Atributo();
					$atributo->setId($linhaatributo['id_atributo']);
					$atributo->setNome($linhaatributo['nome']);
					$atributo->setTipo($linhaatributo['tipo']);
					$atributo->setIndice($linhaatributo['indice']);
					$atributo->setTipoDeRelacionamentoComObjeto($linhaatributo['relacionamento_com_objeto']);
					$objeto->addAtributo($atributo);
					
				}
				

				
				$software->addObjetoNaLista($objeto);
				
				
			}
			
			return $software;
			
			
		}
		else
		{
			
			return null;
		}
		
	}
	
	
	
	
}




?>


