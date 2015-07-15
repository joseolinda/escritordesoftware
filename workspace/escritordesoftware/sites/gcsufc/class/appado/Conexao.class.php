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

					$conexao = new PDO('mysql:host=localhost;port=3306;dbname=mvlineco_GCSUFC','root','cocacola@12');
							return $conexao;
		}
							
				public static function geraBancoDeDados()
				{
				$conexao = new PDO('mysql:host=localhost;port=3306;','root','cocacola@12');$sql = "SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
					SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
					SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';
					
					DROP SCHEMA IF EXISTS `mvlineco_GCSUFC` ;
					CREATE SCHEMA IF NOT EXISTS `mvlineco_GCSUFC` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
					USE `mvlineco_GCSUFC` ;
				
				-- -----------------------------------------------------
				-- Table `mvlineco_GCSUFC`.`blog`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `mvlineco_GCSUFC`.`blog` ;
				
				
				CREATE  TABLE IF NOT EXISTS `mvlineco_GCSUFC`.`blog` (
				`id` INT NOT NULL AUTO_INCREMENT , 
						`titulo` VARCHAR(300) NULL ,	
						`corpo` VARCHAR(300) NULL ,	
						`data` VARCHAR(300) NULL ,	
						`hora` VARCHAR(300) NULL ,	
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
				
				-- -----------------------------------------------------
				-- Table `mvlineco_GCSUFC`.`categoria`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `mvlineco_GCSUFC`.`categoria` ;
				
				
				CREATE  TABLE IF NOT EXISTS `mvlineco_GCSUFC`.`categoria` (
				`id` INT NOT NULL AUTO_INCREMENT , 
						`nome` VARCHAR(300) NULL ,	
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
				
				-- -----------------------------------------------------
				-- Table `mvlineco_GCSUFC`.`autor`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `mvlineco_GCSUFC`.`autor` ;
				
				
				CREATE  TABLE IF NOT EXISTS `mvlineco_GCSUFC`.`autor` (
				`id` INT NOT NULL AUTO_INCREMENT , 
						`nome` VARCHAR(300) NULL ,	
						`nome_completo` VARCHAR(300) NULL ,	
						`ultimo_nome` VARCHAR(300) NULL ,	
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
				
				-- -----------------------------------------------------
				-- Table `mvlineco_GCSUFC`.`sessao`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `mvlineco_GCSUFC`.`sessao` ;
				
				
				CREATE  TABLE IF NOT EXISTS `mvlineco_GCSUFC`.`sessao` (
				`id` INT NOT NULL AUTO_INCREMENT , 
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
				
				-- -----------------------------------------------------
				-- Table `mvlineco_GCSUFC`.`usuario`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `mvlineco_GCSUFC`.`usuario` ;
				
				
				CREATE  TABLE IF NOT EXISTS `mvlineco_GCSUFC`.`usuario` (
				`id` INT NOT NULL AUTO_INCREMENT , 
						`nome` VARCHAR(300) NULL ,	
						`login` VARCHAR(300) NULL ,	
						`email` VARCHAR(300) NULL ,	
						`senha` VARCHAR(300) NULL ,	
						`nivel` VARCHAR(300) NULL ,	
						`data` VARCHAR(300) NULL ,	
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
				
				-- -----------------------------------------------------
				-- Table `mvlineco_GCSUFC`.`livro`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `mvlineco_GCSUFC`.`livro` ;
				
				
				CREATE  TABLE IF NOT EXISTS `mvlineco_GCSUFC`.`livro` (
				`id` INT NOT NULL AUTO_INCREMENT , 
						`referencia` VARCHAR(300) NULL ,	
						`titulo` VARCHAR(300) NULL ,	
						`descricao` VARCHAR(300) NULL ,	
						`caminho_foto` VARCHAR(300) NULL ,	
						`link_de_download` VARCHAR(300) NULL ,	
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						
								
					-- -----------------------------------------------------
					-- Table `mvlineco_GCSUFC`.`blog_usuario`
					-- -----------------------------------------------------
					DROP TABLE IF EXISTS `mvlineco_GCSUFC`.`blog_usuario` ;
					CREATE  TABLE IF NOT EXISTS `mvlineco_GCSUFC`.`blog_usuario` (
					`id` INT NOT NULL AUTO_INCREMENT ,
					`blog_id` INT NOT NULL ,
					`usuario_id` INT NOT NULL ,
					  PRIMARY KEY (`id`) ,
					  INDEX `fk_table1_blog4` (`blog_id` ASC) ,
					  INDEX `fk_table1_usuario4` (`usuario_id` ASC) ,
  					CONSTRAINT `fk_table1_blog4`
    				FOREIGN KEY (`blog_id` )
    				REFERENCES `mvlineco_GCSUFC`.`blog` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION,
  					CONSTRAINT `fk_table1_usuario4`
    				FOREIGN KEY (`usuario_id` )
    				REFERENCES `mvlineco_GCSUFC`.`usuario` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION)
					ENGINE = InnoDB;
					  		
								
								
					-- -----------------------------------------------------
					-- Table `mvlineco_GCSUFC`.`blog_categoria`
					-- -----------------------------------------------------
					DROP TABLE IF EXISTS `mvlineco_GCSUFC`.`blog_categoria` ;
					CREATE  TABLE IF NOT EXISTS `mvlineco_GCSUFC`.`blog_categoria` (
					`id` INT NOT NULL AUTO_INCREMENT ,
					`blog_id` INT NOT NULL ,
					`categoria_id` INT NOT NULL ,
					  PRIMARY KEY (`id`) ,
					  INDEX `fk_table1_blog5` (`blog_id` ASC) ,
					  INDEX `fk_table1_categoria5` (`categoria_id` ASC) ,
  					CONSTRAINT `fk_table1_blog5`
    				FOREIGN KEY (`blog_id` )
    				REFERENCES `mvlineco_GCSUFC`.`blog` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION,
  					CONSTRAINT `fk_table1_categoria5`
    				FOREIGN KEY (`categoria_id` )
    				REFERENCES `mvlineco_GCSUFC`.`categoria` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION)
					ENGINE = InnoDB;
					  		
								
								
					-- -----------------------------------------------------
					-- Table `mvlineco_GCSUFC`.`sessao_usuario`
					-- -----------------------------------------------------
					DROP TABLE IF EXISTS `mvlineco_GCSUFC`.`sessao_usuario` ;
					CREATE  TABLE IF NOT EXISTS `mvlineco_GCSUFC`.`sessao_usuario` (
					`id` INT NOT NULL AUTO_INCREMENT ,
					`sessao_id` INT NOT NULL ,
					`usuario_id` INT NOT NULL ,
					  PRIMARY KEY (`id`) ,
					  INDEX `fk_table1_sessao1` (`sessao_id` ASC) ,
					  INDEX `fk_table1_usuario1` (`usuario_id` ASC) ,
  					CONSTRAINT `fk_table1_sessao1`
    				FOREIGN KEY (`sessao_id` )
    				REFERENCES `mvlineco_GCSUFC`.`sessao` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION,
  					CONSTRAINT `fk_table1_usuario1`
    				FOREIGN KEY (`usuario_id` )
    				REFERENCES `mvlineco_GCSUFC`.`usuario` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION)
					ENGINE = InnoDB;
					  		
								
								
					-- -----------------------------------------------------
					-- Table `mvlineco_GCSUFC`.`livro_autor`
					-- -----------------------------------------------------
					DROP TABLE IF EXISTS `mvlineco_GCSUFC`.`livro_autor` ;
					CREATE  TABLE IF NOT EXISTS `mvlineco_GCSUFC`.`livro_autor` (
					`id` INT NOT NULL AUTO_INCREMENT ,
					`livro_id` INT NOT NULL ,
					`autor_id` INT NOT NULL ,
					  PRIMARY KEY (`id`) ,
					  INDEX `fk_table1_livro3` (`livro_id` ASC) ,
					  INDEX `fk_table1_autor3` (`autor_id` ASC) ,
  					CONSTRAINT `fk_table1_livro3`
    				FOREIGN KEY (`livro_id` )
    				REFERENCES `mvlineco_GCSUFC`.`livro` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION,
  					CONSTRAINT `fk_table1_autor3`
    				FOREIGN KEY (`autor_id` )
    				REFERENCES `mvlineco_GCSUFC`.`autor` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION)
					ENGINE = InnoDB;
					  		
								
								
					-- -----------------------------------------------------
					-- Table `mvlineco_GCSUFC`.`livro_categoria`
					-- -----------------------------------------------------
					DROP TABLE IF EXISTS `mvlineco_GCSUFC`.`livro_categoria` ;
					CREATE  TABLE IF NOT EXISTS `mvlineco_GCSUFC`.`livro_categoria` (
					`id` INT NOT NULL AUTO_INCREMENT ,
					`livro_id` INT NOT NULL ,
					`categoria_id` INT NOT NULL ,
					  PRIMARY KEY (`id`) ,
					  INDEX `fk_table1_livro5` (`livro_id` ASC) ,
					  INDEX `fk_table1_categoria5` (`categoria_id` ASC) ,
  					CONSTRAINT `fk_table1_livro5`
    				FOREIGN KEY (`livro_id` )
    				REFERENCES `mvlineco_GCSUFC`.`livro` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION,
  					CONSTRAINT `fk_table1_categoria5`
    				FOREIGN KEY (`categoria_id` )
    				REFERENCES `mvlineco_GCSUFC`.`categoria` (`id` )
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