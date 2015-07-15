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
				-- Table `meu_banco_de_dados`.`site`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `meu_banco_de_dados`.`site` ;
				
				
				CREATE  TABLE IF NOT EXISTS `meu_banco_de_dados`.`site` (
				`id` INT NOT NULL AUTO_INCREMENT , 
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
				
				-- -----------------------------------------------------
				-- Table `meu_banco_de_dados`.`banco_de_dados`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `meu_banco_de_dados`.`banco_de_dados` ;
				
				
				CREATE  TABLE IF NOT EXISTS `meu_banco_de_dados`.`banco_de_dados` (
				`id` INT NOT NULL AUTO_INCREMENT , 
						`nome` VARCHAR(300) NULL ,	
						`senha` VARCHAR(300) NULL ,	
						`port` VARCHAR(300) NULL ,	
						`usuario` VARCHAR(300) NULL ,	
						`host` VARCHAR(300) NULL ,	
						`tipo` VARCHAR(300) NULL ,	
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
				
				-- -----------------------------------------------------
				-- Table `meu_banco_de_dados`.`software`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `meu_banco_de_dados`.`software` ;
				
				
				CREATE  TABLE IF NOT EXISTS `meu_banco_de_dados`.`software` (
				`id` INT NOT NULL AUTO_INCREMENT , 
						`nome` VARCHAR(300) NULL ,	
						`tipo` VARCHAR(300) NULL ,	
						`indice` VARCHAR(300) NULL ,	
						`auto_increment` VARCHAR(300) NULL ,	
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
								
					-- -----------------------------------------------------
					-- Table `meu_banco_de_dados`.`site_software`
					-- -----------------------------------------------------
					DROP TABLE IF EXISTS `meu_banco_de_dados`.`site_software` ;
					CREATE  TABLE IF NOT EXISTS `meu_banco_de_dados`.`site_software` (
					`id` INT NOT NULL AUTO_INCREMENT ,
					`site_id` INT NOT NULL ,
					`software_id` INT NOT NULL ,
					  PRIMARY KEY (`id`) ,
					  INDEX `fk_table1_site2` (`site_id` ASC) ,
					  INDEX `fk_table1_software2` (`software_id` ASC) ,
  					CONSTRAINT `fk_table1_site2`
    				FOREIGN KEY (`site_id` )
    				REFERENCES `meu_banco_de_dados`.`site` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION,
  					CONSTRAINT `fk_table1_software2`
    				FOREIGN KEY (`software_id` )
    				REFERENCES `meu_banco_de_dados`.`software` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION)
					ENGINE = InnoDB;
					  		
								
								
					-- -----------------------------------------------------
					-- Table `meu_banco_de_dados`.`site_banco_de_dados`
					-- -----------------------------------------------------
					DROP TABLE IF EXISTS `meu_banco_de_dados`.`site_banco_de_dados` ;
					CREATE  TABLE IF NOT EXISTS `meu_banco_de_dados`.`site_banco_de_dados` (
					`id` INT NOT NULL AUTO_INCREMENT ,
					`site_id` INT NOT NULL ,
					`banco_de_dados_id` INT NOT NULL ,
					  PRIMARY KEY (`id`) ,
					  INDEX `fk_table1_site3` (`site_id` ASC) ,
					  INDEX `fk_table1_banco_de_dados3` (`banco_de_dados_id` ASC) ,
  					CONSTRAINT `fk_table1_site3`
    				FOREIGN KEY (`site_id` )
    				REFERENCES `meu_banco_de_dados`.`site` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION,
  					CONSTRAINT `fk_table1_banco_de_dados3`
    				FOREIGN KEY (`banco_de_dados_id` )
    				REFERENCES `meu_banco_de_dados`.`banco_de_dados` (`id` )
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