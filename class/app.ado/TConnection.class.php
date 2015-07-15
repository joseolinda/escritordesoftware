<?php


final class TConnection
{
	
	private function __construct(){}
	
	
	/**
	 * metodo open
	 * recebe o nome do banco de dados e instancia o objeto PDO correspondente
	 * 
	 * @param string $name
	 */
	public static function open($name){
		if(file_exists("app.config/{$name}.ini")){
			
			$db=  parse_ini_file("app.config/{$name}.ini");
			
		}else
		{
			throw new Exception("Arquivo '$name' não encontrado");
			
			
			
			
		}
		$user = $db['user'];
		$pass = $db['pass'];
		$name = $db['name'];
		$host = $db['host'];
		$type = $db['type'];
		
		
		switch($type)
		{
			case 'mysql':

				$conn = new PDO("mysql:{$host};port=3306;dbname={$name}", $user, $pass);
				break;
				
			case 'pgsql':
				$conn = new PDO("pgsql:dbname={$name};user={$user};password={$pass};host=$host");
				break;
			case 'sqlite':
				$conn = new PDO("sqlite:{$name}");
				break;
			case 'ibase':
				$conn = new PDO("firebird:dbname={$name}", $user, $pass);
				break;
			case 'oci8':
				$conn = new PDO("oci:dbname={$name}", $user, $pass);
				break;
			case 'mssql':
				$conn = new PDO("mssql:host={$host},1433;dbname={$name}",$user, $pass);
				break;
				

				
		}
		//define para que o pdo lance exceções na ocorrencia de erros
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//retorna o objeto da conexao
		return $conn;
		
		
		
		
	}
	
	
	
}



?>