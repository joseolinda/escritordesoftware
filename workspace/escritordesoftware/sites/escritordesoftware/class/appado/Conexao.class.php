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

					$conexao = new PDO('mysql:host=localhost;port=3306;dbname=escritordesoftware','root','cocacola@12');
							return $conexao;
		}
							
				public static function geraBancoDeDados()
				{
				$conexao = new PDO('mysql:host=localhost;port=3306;','root','cocacola@12');$sql = "SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
					SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
					SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';
					
					DROP SCHEMA IF EXISTS `escritordesoftware` ;
					CREATE SCHEMA IF NOT EXISTS `escritordesoftware` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
					USE `escritordesoftware` ;
				
				-- -----------------------------------------------------
				-- Table `escritordesoftware`.`site`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `escritordesoftware`.`site` ;
				
				
				CREATE  TABLE IF NOT EXISTS `escritordesoftware`.`site` (
				`id` INT NOT NULL AUTO_INCREMENT , 
						`nome` VARCHAR(300) NULL ,	
						`software` VARCHAR(300) NULL ,	
						`banco_de_dados` VARCHAR(300) NULL ,	
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
				
				-- -----------------------------------------------------
				-- Table `escritordesoftware`.`software`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `escritordesoftware`.`software` ;
				
				
				CREATE  TABLE IF NOT EXISTS `escritordesoftware`.`software` (
				`id` INT NOT NULL AUTO_INCREMENT , 
						`nome` VARCHAR(300) NULL ,	
						`software` VARCHAR(300) NULL ,	
						`banco_de_dados` VARCHAR(300) NULL ,	
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
				
				-- -----------------------------------------------------
				-- Table `escritordesoftware`.`banco_de_dados`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `escritordesoftware`.`banco_de_dados` ;
				
				
				CREATE  TABLE IF NOT EXISTS `escritordesoftware`.`banco_de_dados` (
				`id` INT NOT NULL AUTO_INCREMENT , 
						`nome` VARCHAR(300) NULL ,	
						`software` VARCHAR(300) NULL ,	
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
				
				-- -----------------------------------------------------
				-- Table `escritordesoftware`.`objeto`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `escritordesoftware`.`objeto` ;
				
				
				CREATE  TABLE IF NOT EXISTS `escritordesoftware`.`objeto` (
				`id` INT NOT NULL AUTO_INCREMENT , 
						`nome` VARCHAR(300) NULL ,	
						`software` VARCHAR(300) NULL ,	
						`banco_de_dados` VARCHAR(300) NULL ,	
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
				
				-- -----------------------------------------------------
				-- Table `escritordesoftware`.`atributo`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `escritordesoftware`.`atributo` ;
				
				
				CREATE  TABLE IF NOT EXISTS `escritordesoftware`.`atributo` (
				`id` INT NOT NULL AUTO_INCREMENT , 
						`nome` VARCHAR(300) NULL ,	
						`software` VARCHAR(300) NULL ,	
						`banco_de_dados` VARCHAR(300) NULL ,	
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
								
					-- -----------------------------------------------------
					-- Table `escritordesoftware`.`banco_de_dados_banco_de_dados`
					-- -----------------------------------------------------
					DROP TABLE IF EXISTS `escritordesoftware`.`banco_de_dados_banco_de_dados` ;
					CREATE  TABLE IF NOT EXISTS `escritordesoftware`.`banco_de_dados_banco_de_dados` (
					`id` INT NOT NULL AUTO_INCREMENT ,
					`banco_de_dados_id` INT NOT NULL ,
					`banco_de_dados_id` INT NOT NULL ,
					  PRIMARY KEY (`id`) ,
					  INDEX `fk_table1_banco_de_dados4` (`banco_de_dados_id` ASC) ,
					  INDEX `fk_table1_banco_de_dados4` (`banco_de_dados_id` ASC) ,
  					CONSTRAINT `fk_table1_banco_de_dados4`
    				FOREIGN KEY (`banco_de_dados_id` )
    				REFERENCES `escritordesoftware`.`banco_de_dados` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION,
  					CONSTRAINT `fk_table1_banco_de_dados4`
    				FOREIGN KEY (`banco_de_dados_id` )
    				REFERENCES `escritordesoftware`.`banco_de_dados` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION)
					ENGINE = InnoDB;
					  		
								
				

					SET SQL_MODE=@OLD_SQL_MODE;
					SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
					SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;";
				
				$conexao->query($sql);
			}//fecha metodo gerador do banco
			
					
	}//fecha classe conexao
				?>