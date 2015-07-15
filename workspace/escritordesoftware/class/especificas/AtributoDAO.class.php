<?php



class AtributoDAO{
	private $conexao;
	
	
	public function deletarAtributo(Atributo $atributo){
		
		$id = $atributo->getId();
		
		$sql = "DELETE FROM atributo WHERE id_atributo='$id'";
		//echo $sql;
		
		if($this->conexao->query($sql)){
			return true;
		}else{
			return false;
		}
		
		
	}
	
	public function setConexao(PDO $conexao){
		
		$this->conexao = $conexao; 
	}
	
	
	public function inserir(Objeto $objeto, Atributo $atributo)
	{

		$idDoObjeto = $objeto->getId();
		
		$indice = $atributo->getIndice();
		$nome = $atributo->getNome();
		$tipo = $atributo->getTipo();
		$relacionamento = $atributo->getTipoDeRelacionamentoComObjeto();

		
		
		$insert = "INSERT into atributo (objeto_id_objeto, nome, tipo, indice, relacionamento_com_objeto) 
		values($idDoObjeto, '$nome', '$tipo', '$indice', '$relacionamento')";
		if($this->conexao->query($insert)){
			return true;
		}else{
			return false;
		}
		
		
		
	}
	public function definirComoPrimaryKey(Atributo $atributo)
	{
		//objetivo é definir este atributo como primaryKey
		
	}
	public function retirarPrimaryKeyDeObjeto(){
		
	}
	
	
	
}




?>