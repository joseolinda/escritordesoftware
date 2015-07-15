<?php

/**
 * Prove metodos necessarios para prover uma transacao
 * @author jefferson
 *
 */

final class TTransaction{
	private static $conn; //conexao ativa
	private static $logger; //objeto de LOG
	
	
	/**
	 * metodo __construct()
	 * Declarado como private, pois nao queremos nenhum objeto sendo instanciado
	 * 
	 */
	
	
	private function __construct(){}
	/**
	 * metodo open
	 * abre uma transacao e uma conexao ao bd
	 * @param  $database = nome do banco de dados
	 */
	public static function open($database){
		//abre uma conexao e armazena a propriedade estatica $conn
		if(empty(self::$conn)){
			self::$conn = TConnection::open($database);
			//inicia a transacao
			self::$conn->beginTransaction();
			self::$logger = NULL;
		}
		
	}
	/**
	 * metodo get()
	 * retorna a conexao ativa da transacao
	 */
	public static function get(){
		//retorna conexao ativa
		return self::$conn;
		
	}
	/**
	 * metodo rollback()
	 * desfaz todas as operacoes realizadas na transacao
	 */
	public static function rollback(){
		if(self::$conn)
		{
			//desfaz as operacoes realizadas 
			//durante a transacao
			self::$conn->rollBack();
			self::$conn = NULL;
			
			
		}
	}
	
	public static function close(){
		
		self::$conn->commit();
		self::$conn = null;
		
	}
	
	/**
	 * define qual a estragegia
	 * @param TLogger $logger
	 */
	public static function setLogger(TLogger $logger)
	{
		self::$logger = $logger;
		
		
	}
	public static function log($message)
	{

		if(self::$logger)
		{
			self::$logger->write($message);
			
		}
		
	}
	
	
}


?>