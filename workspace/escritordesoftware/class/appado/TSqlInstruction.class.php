<?php


/**
 * Classe TSqlInstruction
 * Esta classe prove os metodos em comum entre
 * todas as instrucoes SQL(INSERT, DELETE, SELECT, UPDATE)
 * @author Jefferson
 *
 */

abstract class TSqlInstruction{
	
	protected $sql;
	protected $criteria;

	
	
	
	/**
	 * Metodo setEntity
	 * Define o nome da entidade(tabela) manipulada pela instrucao sql
	 * @param $entity = tabela
	 */
	final public function setEntity($entity){
		$this->entity = $entity;
		
		
		
	}
	
	/**
	 * Metodo getEntity()
	 * Retorna o nome da entidade(tabela)
	 * @author Jefferson Uchoa Ponte
	 */
	final public function getEntity(){
		return $this->entity;
		
	}
	/**
	 * Metodo setCriteria()
	 * Define um criterio de seleao dos dados atraves da composicao de um objeto
	 * do tipo TCriteria, que oferece uma interface para definicao de criterios
	 * @param $criteria = objeto do tipo TCriteria
	 */
	public function setCriteria(TCriteria $criteria){
		$this->criteria = $criteria;
		
		
	}
	/**
	 * metodo getInstruction()
	 * declarando-o como <abstract> obrigamos sua declaracao nas classes filhas, 
	 * uma vez que seu comportamento sera distinto em cada uma delas, configurando polimorfismo
	 * 
	 */
	abstract function getInstruction();
	
}


?>