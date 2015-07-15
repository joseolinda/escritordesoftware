<?php
class Conexao
{

	/**
	 * Metodo Construtor
	 * Está private, pois o objeto nao podera ser instanciado
	 * POrtanto, todos os metodos sao do tipo static
	 */
	private function __construct(){
	}

	public static function retornaConexaoComBanco()
	{

		$conexao = new PDO('mysql:host=localhost;port=3306;dbname=escritor7','root','ponte@12jef');
		return $conexao;
	}
		
	public static function geraBancoDeDados()
	{
		$conexao = new PDO('mysql:host=localhost;port=3306;','root','ponte@12jef');
		
		$sql = "SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `escritordesoftware` ;
CREATE SCHEMA IF NOT EXISTS `escritordesoftware` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `escritordesoftware` ;

-- -----------------------------------------------------
-- Table `escritordesoftware`.`site`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `escritordesoftware`.`site` ;

CREATE  TABLE IF NOT EXISTS `escritordesoftware`.`site` (
  `id_site` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_site`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `escritordesoftware`.`site_software`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `escritordesoftware`.`site_software` ;

CREATE  TABLE IF NOT EXISTS `escritordesoftware`.`site_software` (
  `id_site_software` INT NOT NULL ,
  PRIMARY KEY (`id_site_software`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `escritordesoftware`.`software`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `escritordesoftware`.`software` ;

CREATE  TABLE IF NOT EXISTS `escritordesoftware`.`software` (
  `id_software` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(500) NULL ,
  PRIMARY KEY (`id_software`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `escritordesoftware`.`objeto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `escritordesoftware`.`objeto` ;

CREATE  TABLE IF NOT EXISTS `escritordesoftware`.`objeto` (
  `id_objeto` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(500) NULL ,
  `id_software` INT NOT NULL ,
  `persistencia` INT NULL ,
  PRIMARY KEY (`id_objeto`) ,
  INDEX `fk_objeto_software_idx` (`id_software` ASC) ,
  CONSTRAINT `fk_objeto_software`
    FOREIGN KEY (`id_software` )
    REFERENCES `escritordesoftware`.`software` (`id_software` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `escritordesoftware`.`atributo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `escritordesoftware`.`atributo` ;

CREATE  TABLE IF NOT EXISTS `escritordesoftware`.`atributo` (
  `id_atributo` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(500) NULL ,
  `tipo` VARCHAR(500) NULL ,
  `tamanho` INT NULL ,
  `id_objeto` INT NOT NULL ,
  PRIMARY KEY (`id_atributo`) ,
  INDEX `fk_atributo_objeto1_idx` (`id_objeto` ASC) ,
  CONSTRAINT `fk_atributo_objeto1`
    FOREIGN KEY (`id_objeto` )
    REFERENCES `escritordesoftware`.`objeto` (`id_objeto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `escritordesoftware`.`relacao_de_objetos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `escritordesoftware`.`relacao_de_objetos` ;

CREATE  TABLE IF NOT EXISTS `escritordesoftware`.`relacao_de_objetos` (
  `id_relacao_de_objetos` INT NOT NULL AUTO_INCREMENT ,
  `id_objeto_pai` INT NOT NULL ,
  `id_objeto_filho` INT NOT NULL ,
  `tipo_de_relacao` INT NULL ,
  PRIMARY KEY (`id_relacao_de_objetos`) ,
  INDEX `fk_relacao_de_objetos_objeto1_idx` (`id_objeto_pai` ASC) ,
  INDEX `fk_relacao_de_objetos_objeto2_idx` (`id_objeto_filho` ASC) ,
  CONSTRAINT `fk_relacao_de_objetos_objeto1`
    FOREIGN KEY (`id_objeto_pai` )
    REFERENCES `escritordesoftware`.`objeto` (`id_objeto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_relacao_de_objetos_objeto2`
    FOREIGN KEY (`id_objeto_filho` )
    REFERENCES `escritordesoftware`.`objeto` (`id_objeto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `escritordesoftware` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
		";

		$conexao->query($sql);
	}//fecha metodo gerador do banco
		
		
}//fecha classe conexao
?>
