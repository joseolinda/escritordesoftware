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

					$conexao = new PDO('mysql:host=localhost;port=3306;dbname=agenda','root','ponte@12jef');
							return $conexao;
		}
							
				public static function geraBancoDeDados()
				{
				$conexao = new PDO('mysql:host=localhost;port=3306;','root','ponte@12jef');$sql = "SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
					SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
					SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';
					
					DROP SCHEMA IF EXISTS `agenda` ;
					CREATE SCHEMA IF NOT EXISTS `agenda` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
					USE `agenda` ;
				
				-- -----------------------------------------------------
				-- Table `agenda`.`pessoa`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `agenda`.`pessoa` ;
				
				
				CREATE  TABLE IF NOT EXISTS `agenda`.`pessoa` (
				`id` INT NOT NULL AUTO_INCREMENT , 
						`nome` VARCHAR(300) NULL ,	
						`idade` VARCHAR(300) NULL ,	
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
				
				-- -----------------------------------------------------
				-- Table `agenda`.`endereco`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `agenda`.`endereco` ;
				
				
				CREATE  TABLE IF NOT EXISTS `agenda`.`endereco` (
				`id` INT NOT NULL AUTO_INCREMENT , 
						`rua` VARCHAR(300) NULL ,	
						`numero` VARCHAR(300) NULL ,	
						`bairro` VARCHAR(300) NULL ,	
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
				

					SET SQL_MODE=@OLD_SQL_MODE;
					SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
					SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;";
				
				$conexao->query($sql);
			}//fecha metodo gerador do banco
			
					
	}//fecha classe conexao
				?>
