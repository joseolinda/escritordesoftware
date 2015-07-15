<?php
/**
 * geraIndex()
 * geraObjeto()
 * abreObjetoDAO()
 * geraConstrutorDoDAO()
 * abreMetodoInserir()
 * geraConteudoDeInserir()
 * fechaMetodoInserir()
 * fechaObjetoDAO()
 * abreClassConexao()
 * geraretornaConexaoComBanco();
 * geracriaBancoDeDados();
 * geraSqlDoBancoDeDados();
 * fechaClassConexao()
 * geraMetotodoRetornaOb
 * @author jefferson
 *
 */

class GeradorDeCodigo{
	public $Site;
	public $NomeDoArquivo;
	public $Codigo;


	public function setSite(Site $site){
		$this->Site = $site;
	}
	public function getSite(){
		return $this->Site;

	}
	public function getNomeDoArquivo(){
		return  $this->NomeDoArquivo;
	}
	public function getCodigo(){
		return $this->Codigo;
	}
	public function geraIndex()
	{
		$codigo ="";
		$nomeDoSite = $this->Site->getNome();
		$codigo .= '
<?php
function __autoload($classe)
{
	if(file_exists("class/especificas/{$classe}.class.php"))
	{
		include_once "class/especificas/{$classe}.class.php";

	}
	elseif (file_exists("class/appado/{$classe}.class.php"))
	{
		include_once "class/appado/{$classe}.class.php";

	}


}
?>
<!DOCTYPE html>
<html>
	<body>
		<h1>Teste Iremos mostrar os dados recolhidos</h1>

		<p>Nome do site: '.$nomeDoSite .'.</p>
	</body>
</html>';


		return $codigo;


	}
	public function geraObjeto(Objeto $objeto)
	{
		$nomeDoSite = $this->Site->getNome();
		$nomeDoObjeto = $objeto->getNome();
		$nomeDoObjetoMa = strtoupper(substr($objeto->getNome(), 0, 1)).substr($objeto->getNome(), 1);
		$codigo  = '<?php

				/**
				* Classe feita para manipulação do objeto '.$nomeDoObjeto.'
						* feita automaticamente com programa gerador de software inventado por
						* Autor Jefferson Uchôa Ponte
						*
						*
						*/
						class '.$nomeDoObjetoMa.'
						{

								';


		foreach ($objeto->getAtributos() as $atributo)
		{
			$nome = $atributo->getNome();
			$nome2 = strtoupper(substr($atributo->getNome(), 0, 1)).substr($atributo->getNome(), 1, 100);

			$codigo .= '
					private $'.$nome2.';
							';

		}

		foreach ($objeto->getAtributos() as $atributo)
		{

			$nome = $atributo->getNome();
			$nome2 = strtoupper(substr($atributo->getNome(), 0, 1)).substr($atributo->getNome(), 1, 100);
			$tipo = $atributo->getTipo();


			if($atributo->getTipo() != 'objeto')
			{

				$codigo .= '
						public function set'.$nome2.'($'.$nome.')
						{';
				$codigo .= '
						$this->'.$nome2.' = $'.$nome.';

			}
								';
			}
			else
			{
				$codigo .= '
						public function set'.$nome2.'('.$nome2.' $'.$nome.')
						{';

				$codigo .= '
						$this->'.$nome2.' = $'.$nome.';

			}
								';
			}
				




			$codigo .= '
					public function get'.$nome2.'()
					{
							return $this->'.$nome2.';
										
		}
										
									';
				
		}




		$codigo .='
	}
				?>';

		$this->Codigo = $codigo;
		$this->NomeDoArquivo = 'sites/'.$nomeDoSite.'/class/especificas/'.strtoupper(substr($objeto->getNome(), 0, 1)).substr($objeto->getNome(),1,100).'.class.php';
			

	}

	public function abreObjetoDAO(Objeto $objeto)
	{

		$nomeDoSite = $this->Site->getNome();
		$NomeDoObjeto = $objeto->getNome();
		$objetoNomeMA = strtoupper(substr($NomeDoObjeto , 0, 1)).substr($NomeDoObjeto,1,100);
		$conteudo = '<?php


				class '.$objetoNomeMA.'DAO
				{
						public $Conexao;

						';


		$this->Codigo = $conteudo;
		$this->NomeDoArquivo = 'sites/'.$nomeDoSite.'/class/especificas/'.$objetoNomeMA.'DAO.class.php';


	}
	public function geraConstrutorDoDAO()
	{
		$codigo = '
				public function __construct()
				{
				$this->Conexao = Conexao::retornaConexaoComBanco();

	}

				';

		$this->Codigo .= $codigo;
	}


	public function abreMetodoInserir(Objeto $objeto)
	{
		$nomeDoSite = $this->Site->getNome();
		$NomeDoObjeto = $objeto->getNome();
		$objetoNomeMA = strtoupper(substr($NomeDoObjeto , 0, 1)).substr($NomeDoObjeto,1,100);
		$codigo = '
				public function inserir('.$objetoNomeMA.' $'.$NomeDoObjeto.')
				{
						';

		$this->Codigo .= $codigo;



	}

	public function geraConteudoDeInserir(Objeto $objeto)
	{
		$NomeDoObjeto = $objeto->getNome();
		$codigo = "";

		foreach ($objeto->getAtributos() as $atributo)
		{
			$nomeDoAtributo =  $atributo->getNome();
			$nomeDoAtributoMA = strtoupper(substr($nomeDoAtributo  , 0, 1)).substr($nomeDoAtributo ,1,100);
			$tipo = $atributo->getTipo();
			if($nomeDoAtributo == 'id')
			{
				$codigo .= '


						if($'.$NomeDoObjeto.'->getId() != null)
						{
								$instrucao = new TSqlUpdate();
								$instrucao->setEntity("'.$nomeDoAtributo.'");
											
											
										$criteria = new TCriteria();
										$criteria->add(new TFilter(\'id\', \'=\', $'.$nomeDoAtributoMA.'->getId()));
												$instrucao->setCriteria($criteria);


			}
												else
												{

												$instrucao = new TSqlInsert();
												$instrucao->setEntity("'.$NomeDoObjeto.'");
															
			}

														';


			}//fecha if($nomeDoAtributo == 'id')
			elseif ($nomeDoAtributo != 'id' && $tipo == 'objeto')
			{
				//se o atributo for objeto nao faremos nada nesta etapa

			}
			elseif ($nomeDoAtributo != 'id' && $tipo != 'objeto')
			{
				//O atributo nao eh objeto nem eh o id;

				$codigo .= '

						if($'.$NomeDoObjeto.'->get'.$nomeDoAtributoMA.'()!= null)
						{

								$instrucao->setRowData("'.$nomeDoAtributo.'", $'.$NomeDoObjeto.'->get'.$nomeDoAtributoMA.'());

			}

										';
			}
				

		}

		$codigo .= '
				echo $instrucao->getInstruction();

				if($this->Conexao->query($instrucao->getInstruction()))
				{

				echo \'Inserido com sucesso! \';
				if($'.$NomeDoObjeto.'->getId() != null)
				{
						//O objeto tem id?
	}
						else
						{//Não? Então insira o id
						$'.$NomeDoObjeto.'->setId($this->Conexao->lastInsertId());
	}
								//Agora pegaremos a lista de atributos que sao objetos
								//em cada um faremos o seguinte
								//Primeiro perguntamos se ele existe.
								//Precisa fazer um foreach aqui';


		foreach ($objeto->getAtributos() as $atributo)
		{
			$nomeDoAtributo =  $atributo->getNome();
			$nomeDoAtributoMA = strtoupper(substr($nomeDoAtributo  , 0, 1)).substr($nomeDoAtributo ,1,100);
			$tipo = $atributo->getTipo();
			if($tipo == 'objeto')
			{
				$codigo .= '

						if($'.$NomeDoObjeto.'->get'.$nomeDoAtributoMA.'() != null)
						{
								//O objeto existe?
							if($'.$NomeDoObjeto.'->get'.$nomeDoAtributoMA.'()->getId() != null)
							{
								//O atributo id do objeto existe?
								//Sera atualizado

								$'.$nomeDoAtributo.' = $'.$NomeDoObjeto.'->get'.$nomeDoAtributoMA.'();
								$'.$nomeDoAtributo.'dao = new '.$nomeDoAtributoMA.'DAO();
								$'.$nomeDoAtributo.'dao->inserir($'.$nomeDoAtributo.');
								$'.$nomeDoAtributo.'_id = $'.$nomeDoAtributoMA.'->getId();
								$'.$NomeDoObjeto.'_id = $'.$NomeDoObjeto.'->getId();
								//Verificaremos se o relacionamento já existe
								$sql = "SELECT * FROM '.$NomeDoObjeto.'_'.$nomeDoAtributo.' WHERE '.$NomeDoObjeto.'_id = $'.$NomeDoObjeto.'_id  AND '.$nomeDoAtributo.'_id = $'.$nomeDoAtributo.'_id";
								$result = $this->Conexao->query($sql);
								$x = 0;
																							
																						foreach ($result as $linha)
																						{
																						$x = $x + 1;
			}
																						if($x == 0 )
																						{
																						//Nao. Insere relacionamento
																						$sql_insert = "INSERT INTO '.$NomeDoObjeto.'_'.$nomeDoAtributo.'('.$NomeDoObjeto.'_id, '.$nomeDoAtributo.'_id)values($'.$NomeDoObjeto.'_id, $'.$nomeDoAtributo.'_id)";
																								if($this->Conexao->query($sql_insert))
																								{
																								echo \'<br>relacionamento inserido\';
																									
			}//if($this->Conexao->query($sql_insert))
																									
			}//if($x == 0 )
																									
																									
			}//if($'.$NomeDoObjeto.'->get'.$nomeDoAtributoMA.'()->getId() != null)
					else
					{
					//O Atributo objeto nao tem ID, e agora?
					$'.$NomeDoObjeto.'_id = $'.$NomeDoObjeto.'->getId();
							$'.$nomeDoAtributo.'dao = new '.$nomeDoAtributoMA.'DAO();
									$'.$nomeDoAtributo.'dao->inserir($'.$NomeDoObjeto.'->get'.$nomeDoAtributoMA.'());
											$'.$nomeDoAtributo.'_id = $'.$nomeDoAtributo.'dao->Conexao->lastInsertId();
													$sql_insert = "INSERT INTO '.$NomeDoObjeto.'_'.$nomeDoAtributo.'('.$NomeDoObjeto.'_id, '.$nomeDoAtributo.'_id)values($'.$NomeDoObjeto.'_id, $'.$nomeDoAtributo.'_id)";
															if($this->Conexao->query($sql_insert))
															{
															echo \'<br>relacionamento inserido\';

			}

																

			}

			}//if($'.$NomeDoObjeto.'->get'.$nomeDoAtributoMA.'() != null)


						
					';


			}
				
		}



		$codigo .= '




	}
				else
				{

				echo \'Erro! \';

	}
					

				';



		$this->Codigo .= $codigo;



	}
	public function fechaMetodoInserir(Objeto $objeto){

		$codigo = '

	}//fecha metodo inserir';

		$this->Codigo .= $codigo;

	}

	public function fechaObjetoDAO()
	{

		$this->Codigo .= '

	}
				?>';

	}
	public function abreClassConexao()
	{
		$codigo = '<?php
				class Conexao
				{

				/**
				* Metodo Construtor
				* Está private, pois o objeto nao podera ser instanciado
				* POrtanto, todos os metodos sao do tipo static
				*/
				private function __construct(){	}
				';


		$this->NomeDoArquivo = 'sites/'.$this->Site->getNome().'/class/appado/Conexao.class.php';
		$this->Codigo = $codigo;

	}
	public function geraretornaConexaoComBanco()
	{
		$site = $this->Site;
		$banco_de_dados = $this->Site->getBanco_de_dados();
		if($banco_de_dados->getTipo() == 'mysql')
		{
			$codigo = '
					public static function retornaConexaoComBanco()
					{

					$conexao = new PDO(\'mysql:host='.$banco_de_dados->getHost().';port='.$banco_de_dados->getPort().';dbname='.$banco_de_dados->getNome().'\',\''.$banco_de_dados->getUsuario().'\',\''.$banco_de_dados->getSenha().'\');
							return $conexao;
		}
							';
		}

		$this->Codigo .= $codigo;
	}

	public function geracriaBancoDeDados(){
		$banco = $this->Site->getBanco_de_dados();
		$codigo = '
				public static function geraBancoDeDados()
				{
				$conexao = new PDO(\'mysql:host='.$banco->getHost().';port='.$banco->getPort().';\',\''.$banco->getUsuario().'\',\''.$banco->getSenha().'\');';

		$this->Codigo .= $codigo;


	}

	public function geraSqlGeradorDoBanco(Site $site)
	{
		$this->Site = $site;
		
		$nome_do_banco = $this->Site->getBanco_de_dados()->getNome();
		$softwares = $this->Site->getSoftwares();
		
		$codigo  = '$sql = "SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
					SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
					SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE=\'TRADITIONAL\';
					
					DROP SCHEMA IF EXISTS `'.$nome_do_banco.'` ;
					CREATE SCHEMA IF NOT EXISTS `'.$nome_do_banco.'` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
					USE `'.$nome_do_banco.'` ;';
		
		foreach ($softwares as $software)
		{
			$objetos = $software->getObjetos();
			$codigo .= '';
			foreach ($objetos as $objeto)
			{
				$atributos = $objeto->getAtributos();
				$nomeDoObjeto = $objeto->getNome();
				
				$codigo .='
				
				-- -----------------------------------------------------
				-- Table `'.$nome_do_banco.'`.`'.$nomeDoObjeto .'`
				-- -----------------------------------------------------
				DROP TABLE IF EXISTS `'.$nome_do_banco.'`.`'.$nomeDoObjeto .'` ;
				
				
				CREATE  TABLE IF NOT EXISTS `'.$nome_do_banco.'`.`'.$nomeDoObjeto .'` (
				`id` INT NOT NULL AUTO_INCREMENT , ';
				

				foreach($atributos as $atributo)
				{
					$atributoNome = $atributo->getNome();
					$atributoTipo = $atributo->getTipo();
					if($atributoNome != 'id' && $atributoTipo != 'objeto')
					{
						$codigo .= '
						`'.$atributoNome.'` VARCHAR(300) NULL ,	';
					}//if($atributoNome != 'id' && $atributoTipo != 'objeto')
				}//foreach($atributos as $atributo)

				$codigo .= '
				PRIMARY KEY (`id`))
				ENGINE = InnoDB;			
						';
			}//foreach ($objetos as $objeto)	
							
		}//foreach ($softwares as $software)

		foreach ($softwares as $software)
		{
			$objetos = $software->getObjetos();
			foreach ($objetos as $objeto)
			{
				
				$atributos = $objeto->getAtributos();
				$nomeDoObjeto = $objeto->getNome();
				$numero = 0;
				
				foreach($atributos as $atributo)
				{

					$numero = $numero + 1;
					
					$tipo = $atributo->getTipo();
					$nomeDoAtributo = $atributo->getNome();
					if($tipo == 'objeto')
					{

						//echo '<h1>'.$nomeDoObjeto.'---'.$nomeDoAtributo.'</h1>';
						//$nomeDoObjeto
						//$nomeDoAtributo 
						$codigo .='
								
					-- -----------------------------------------------------
					-- Table `'.$nome_do_banco.'`.`'.$nomeDoObjeto.'_'.$nomeDoAtributo.'`
					-- -----------------------------------------------------
					DROP TABLE IF EXISTS `'.$nome_do_banco.'`.`'.$nomeDoObjeto.'_'.$nomeDoAtributo.'` ;
					CREATE  TABLE IF NOT EXISTS `'.$nome_do_banco.'`.`'.$nomeDoObjeto.'_'.$nomeDoAtributo.'` (
					`id` INT NOT NULL AUTO_INCREMENT ,
					`'.$nomeDoObjeto.'_id` INT NOT NULL ,
					`'.$nomeDoAtributo.'_id` INT NOT NULL ,
					  PRIMARY KEY (`id`) ,
					  INDEX `fk_table1_'.$nomeDoObjeto.$numero.'` (`'.$nomeDoObjeto.'_id` ASC) ,
					  INDEX `fk_table1_'.$nomeDoAtributo.$numero.'` (`'.$nomeDoAtributo.'_id` ASC) ,
  					CONSTRAINT `fk_table1_'.$nomeDoObjeto.$numero.'`
    				FOREIGN KEY (`'.$nomeDoObjeto.'_id` )
    				REFERENCES `'.$nome_do_banco.'`.`'.$nomeDoObjeto.'` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION,
  					CONSTRAINT `fk_table1_'.$nomeDoAtributo.$numero.'`
    				FOREIGN KEY (`'.$nomeDoAtributo.'_id` )
    				REFERENCES `'.$nome_do_banco.'`.`'.$nomeDoAtributo.'` (`id` )
    				ON DELETE NO ACTION
    				ON UPDATE NO ACTION)
					ENGINE = InnoDB;
					  		
								';
						
					}//if($tipo == 'objeto')
					
					
				}//foreach($atributos as $atributo)
			}//foreach ($objetos as $objeto)
		}//foreach ($softwares as $software)
		
		
		
		$codigo .= '
				

					SET SQL_MODE=@OLD_SQL_MODE;
					SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
					SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;";
				
				$conexao->query($sql);
			}//fecha metodo gerador do banco
			
					';
		
		$this->Codigo .= $codigo;
	
		
	}



	public function retornaObjeto(Objeto $objeto)
	{
		$nomeDoObjeto = $objeto->getNome();
		$codigo = '
		public function retornaLista()
		{

				$sql = new TSqlSelect();
				$sql->setEntity(\''.$nomeDoObjeto.'\');
				
				
			';	
		$atributos = $objeto->getAtributos();
		foreach ($atributos as $atributo)
		{

			$tipoAtributo = $atributo->getTipo();
			$nomeAtributo = $atributo->getNome();
			if($tipoAtributo != 'objeto'){
				$codigo .= '
						 $instrucao = $sql->addColumn(\''.$nomeAtributo.'\');
';
							
				
			}
			
		}
		
		
		$codigo .= '
		
		$result = $this->Conexao->query($sql->getInstruction());
	
			return $result;
		}';
		
		$this->Codigo .= $codigo;
		
		
		
	}

	public function fechaClassConexao(){
		$codigo  = '
	}//fecha classe conexao
				?>';


		$this->Codigo .= $codigo;

	}
	public function geraPaginas(Objeto $objeto)
	{
		$nomeDoObjeto = $objeto->getNome();
		$nomeDoObjetoMA = strtoupper(substr($nomeDoObjeto, 0, 1)).substr($nomeDoObjeto, 1, 100);
		
		$NomeDoSite = $this->Site->getNome();
		
		$codigo = '
<?php
			function __autoload($classe)
{
	if(file_exists("class/especificas/{$classe}.class.php"))
	{
		include_once "class/especificas/{$classe}.class.php";

	}
	elseif (file_exists("class/appado/{$classe}.class.php"))
	{
		include_once "class/appado/{$classe}.class.php";

	}


}
					

include \'forms/forminserir'.$nomeDoObjeto.'.php\';
				
				
$'.$nomeDoObjeto.' = new '.$nomeDoObjetoMA.'DAO();
$result = $'.$nomeDoObjeto.'->retornaLista();
foreach($result as $linha)
{
	echo \' '.$nomeDoObjeto.'\';
';
		

		$atributos = $objeto->getAtributos();
		foreach ($atributos as $atributo)
		{
			
			$nomeDeAtributo = $atributo->getNome();
			$tipoDeAtributo = $atributo->getTipo();
			if($tipoDeAtributo != 'objeto'){
				$codigo .= ' 
echo $linha[\''.$nomeDeAtributo.'\'].\'<br>\';
';
				
			}
			
		}
	
	
		$codigo .= '
}				
				
?>
				
				';
		$this->Codigo = $codigo;
		$this->NomeDoArquivo = 'sites/'.$NomeDoSite.'/'.$objeto->getNome().'.php';
		
	}
	public function geraFormularios(Objeto $objeto)
	{
		$nomeDOObjeto = $objeto->getNome();
		$nomeDoSite = $this->Site->getNome();
		$codigo = '
<form action="inserir'.$nomeDOObjeto.'.php" method="post">
<fieldset>
		<legend>
		Formulário para adicionar '.$nomeDOObjeto.'
		</legend>
';

		$atributos = $objeto->getAtributos();
		foreach ($atributos as $atributo)
		{
			$variavel = $atributo->getNome();
			$tipo = $atributo->getTipo();
			if($tipo != 'objeto' && $variavel != 'id')
			{
			$codigo .= ' 
			<label for="'.$variavel.'">
					'.$variavel.':
			</label>'.'
					<input type="text" name="'.$variavel.'" id="'.$variavel.'" />
';
			
			}elseif ($variavel == 'id'){
				$codigo .= '
					<input type="hidden" name="'.$variavel.'" id="'.$variavel.'" />
							';
			}
		}
		
		
$codigo .='

		<input type="submit" value="Cadastrar">
		
</fieldset>
</form>';
		$this->NomeDoArquivo = 'sites/'.$nomeDoSite.'/forms/forminserir'.$nomeDOObjeto.'.php';
		$this->Codigo = $codigo;
		
	}
	public function geraArquivoInserirObjeto(Objeto $objeto){
		$nomeDoSite = $this->Site->getNome();
		$nomeDoObjeto = $objeto->getNome();
		$nomeDoObjetoMA = strtoupper(substr($nomeDoObjeto, 0, 1)).substr($nomeDoObjeto, 1, 100);
		$codigo = '
<?php
				
				
function __autoload($classe){


	if(file_exists("class/especificas/{$classe}.class.php"))
	{
		include_once "class/especificas/{$classe}.class.php";

	}elseif (file_exists("class/appado/{$classe}.class.php"))
	{
		include_once "class/appado/{$classe}.class.php";

	}


}
				
				
		$'.$nomeDoObjeto.' = new '.$nomeDoObjetoMA.'();
				
						
				';
		$atributos = $objeto->getAtributos();
		foreach ($atributos as $atributo)
		{
			$NomeAtributo = $atributo->getNome();
			$NomeAtributoMA = strtoupper(substr($NomeAtributo, 0, 1)).substr($NomeAtributo, 1, 100);
			$TipoAtributo = $atributo->getTipo();
			if($TipoAtributo != 'objeto')
			{
				$codigo .= '
					if($_POST["'.$NomeAtributo.'"] != null)
					{
							$'.$nomeDoObjeto.'->set'.$NomeAtributoMA.'($_POST["'.$NomeAtributo.'"]);
					}
					
					';
			}
		}
				
				
				
$codigo .= '
		$'.$nomeDoObjeto.'dao = new  '.$nomeDoObjetoMA.'DAO();
		$'.$nomeDoObjeto.'dao->inserir($'.$nomeDoObjeto.');
				
		?>';
		
		$this->NomeDoArquivo = 'sites/'.$nomeDoSite.'/'.'inserir'.$nomeDoObjeto.'.php';
		$this->Codigo = $codigo;
		
	}
}