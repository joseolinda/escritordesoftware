<?php
				class Conexao
				{

				/**
				* Metodo Construtor
				* Está private, pois o objeto nao podera ser instanciado
				* POrtanto, todos os metodos sao do tipo static
				*/
				private function __construct(){	}
				
					public static function retornaConexaoComBanco()
					{

					$conexao = new PDO('mysql:host=localhost;port=3306;dbname=meu_banco_de_dados','root','cocacola@12');
							return $conexao;
		}
							
				public static function geraBancoDeDados()
				{
				$conexao = new PDO('mysql:host=localhost;port=3306;','root','cocacola@12');$sql = "SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
					SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
					SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';
					
					DROP SCHEMA IF EXISTS `meu_banco_de_dados` ;
					CREATE SCHEMA IF NOT EXISTS `meu_banco_de_dados` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
					USE `meu_banco_de_dados` ;
				
				-- -----------------------------------------------------
				-- Table `meu_banco_de_dados`.`pessoa`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `meu_banco_de_dados`.`pessoa` ;
				
				
				CREATE  TABLE IF NOT EXISTS `meu_banco_de_dados`.`pessoa` (
				`id` INT NOT NULL AUTO_INCREMENT , 
						`nome` VARCHAR(300) NULL ,	
						`telefone` VARCHAR(300) NULL ,	
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
				

					SET SQL_MODE=@OLD_SQL_MODE;
					SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
					SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;";
				
				$conexao->query($sql);
			}//fecha metodo gerador do banco
			
					
	}//fecha classe conexao
				?>