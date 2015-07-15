<?php

/**
 * Essa classe serve para gerenciar conexao com o banco de dados
 * @author Jefferson
 *
 */



class Conexao{


	/**
	 * Metodo Construtor
	 * Está private, pois o objeto nao podera ser instanciado
	 * POrtanto, todos os metodos sao do tipo static
	 */
	private function __construct(){	}


	/**
	 * Com esse metodo vc estara conectado com o banco de dados especificado
	 * @return PDO
	 */
	public static function retornaConexaoComBanco()
	{
		$conexao = new PDO('mysql:host=localhost;port=3306;dbname=loja_virtual','root', 'cocacola@12');
		
		return $conexao;
	}
}
?>