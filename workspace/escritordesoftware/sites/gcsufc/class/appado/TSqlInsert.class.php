<?php
/**
 * Classe TSqlInsert
 * Prove meios para manipulação de uma instrucao de Insert no banco de dados
 * @author Jefferson
 *
 */


final class TSqlInsert extends TSqlInstruction{
	/**
	 * metodo setRowData()
	 * atruibui dados a determinadas colunas do banco de dados
	 * @param unknown_type $column
	 * @param unknown_type $value
	 */
	
	public function setRowData($column, $value){
		if(is_string($value)){
		
			$value = addslashes($value);
			$this->columnValues[$column]="'$value'";
			
		}
		else if(is_bool($value)){
			$this->columnValues[$column] = $value ? 'TRUE' : 'FALSE';
			
		}
		else if(isset($value)){
			$this->columnValues[$column] = $value;
			
		}
		else
		{
			$this->columnValues[$column] = "NULL";
		}
	}//fecha metodo setRowData
	
	/**
	 * metodo setCriteria()
	 * De acordo com o autor do livro PHP orientado a objetos
	 * esse metodo nao existe no contexto dessa classe
	 * aqui vai mandar uma mensagem de erro, mas tenho ligeira impressao de que 
	 * ele se enganou.
	 */
	
	public function setCriteria(TCriteria $criteria){
		throw new Exception("Cannot call setCriteria  from ".__CLASS__);
		
	}//fecha metodo setCriteria
	
	/**
	 * metodo getInstruction()
	 * retorna a instrucao bonitinha em forma de string
	 * @see TSqlInstruction::getInstruction()
	 */
	
	public function getInstruction(){
		$this->sql = "INSERT INTO {$this->entity} (";
		$columns = implode(', ', array_keys($this->columnValues));
		$values = implode(', ', array_values($this->columnValues));
		$this->sql .=$columns . ')';
		$this->sql .=" values ({$values})";
		
		return $this->sql;
		
		
	}//fecha metodo getInstruction()
}//fecha a classe

?>