<?php


class Escritor{
	private $Banco;


	public function setBanco(Banco $banco){
		$this->Banco = $banco;
	}
	/**
	 *
	 * @return string
	 */

	public function criaSetEGet()
	{

		$stringe = ' ';

		$Istring = $this->Banco->getAtributos();
		$Separador = $this->Banco->getSeparador();
		$arrayDeCampos = explode($Separador, $Istring);
		$stringe .= '
<?php

class'.' '.strtoupper(substr($this->Banco->getNome(), 0, 1)).substr($this->Banco->getNome(), 1, 100).'
{
						';
		foreach ($arrayDeCampos as $linha){
			$variavel = trim($linha);
			$stringe .= '
private $'.strtoupper(substr($variavel, 0, 1)).substr($variavel, 1, 100).';
';

		}
		$arrayDeCampos = explode($Separador, $Istring);		
		foreach ($arrayDeCampos as $linha)
		{

			$variavel = trim($linha);




			$stringe .= '
public function set'.strtoupper(substr($variavel, 0, 1)).substr($variavel, 1, 100).'($'.$variavel.')
{
					
$this->'.strtoupper(substr($variavel, 0, 1)).substr($variavel, 1, 100).'= $'.$variavel.';
							
}';



			$stringe .=  '
public function get'.strtoupper(substr($variavel, 0, 1)).substr($variavel, 1, 100).'()
{
					
return $this->'.strtoupper(substr($variavel, 0, 1)).substr($variavel, 1, 100).';
							
}
							';
		}

		$stringe .= '
}
?>';


		return $stringe;




	}
	public function criaDAO(){
		$atributos = $this->Banco->getAtributos();
		$separador = $this->Banco->getSeparador();
		$arraydeatributos = explode($separador, $atributos);
		$stringe = '
<?php
				
class '.$this->Banco->getNome().'DAO
{

public $Conexao;
		
	public function __construct()
	{
				$this->Conexao = Conexao::retornaConexaoComBanco();	
	}

	public function inserir('.strtoupper(substr($this->Banco->getNome(), 0, 1)).substr($this->Banco->getNome(), 1, 100).' $'.$this->Banco->getNome().')
	{
	
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("'.$this->Banco->getNome().'");
	
		
';		
		foreach ($arraydeatributos as $linha)
		{
			$variavel = trim($linha);
			$stringe .= '

				if($'.$this->Banco->getNome().'->get'.strtoupper(substr($variavel, 0, 1)).substr($variavel, 1, 100).'() != null)
				{
							
					$instrucao->setRowData("'.$variavel.'", $'.$this->Banco->getNome().'->get'.strtoupper(substr($variavel, 0, 1)).substr($variavel, 1, 100).'());
					
				}
				';
		}
		
		
		$stringe .='
			if($this->Conexao->query($instrucao->getInstruction()))
			{
				echo \'Inserido com sucesso! \';
			}
			else
			{
				echo \'erro \';
				
			}
		
	}
}
								
?>';
		
		
		
		return $stringe;
	}

	/**
	 * 
	 * @return string
	 */
	public function criaFormInserirObjeto(){

		$atributos = $this->Banco->getAtributos();
		$separador = $this->Banco->getSeparador();
		$arraydeatributos = explode($separador, $atributos);
		
		$stringe = '<form action=\'inserir_'.$this->Banco->getNome().'.php \' method=\'post\'>
				<fieldset><legend>Formulário para adicionar '.$this->Banco->getNome().'</legend>
				';

		foreach ($arraydeatributos as $linha)
		{
			$variavel = trim($linha);
			
			$stringe .= ' <label for="'.$variavel.'">'.$variavel.':</label>'.'<input type="text" name="'.$variavel.'" id="'.$variavel.'" /><br>';
		}
		$stringe .= '
				<input type="submit" value="Cadastrar">
				</fieldset>
				</form>';
		
		
		
		return $stringe;
	}

	public function criaInserirObjeto(){
		$atributos = $this->Banco->getAtributos();
		$separador = $this->Banco->getSeparador();
		$arraydeatributos = explode($separador, $atributos);
	
		$stringe = '<?php
				

function __autoload($classe){


	if(file_exists("class/especificas/{$classe}.class.php"))
	{
		include_once "class/especificas/{$classe}.class.php";

	}elseif (file_exists("class/app.ado/{$classe}.class.php"))
	{
		include_once "class/app.ado/{$classe}.class.php";

	}


}
				

$'.$this->Banco->getNome().' = new '.strtoupper(substr(trim($this->Banco->getNome()), 0, 1)).substr(trim($this->Banco->getNome()), 1, 100).'();
';


		foreach ($arraydeatributos as $linha)
		{
			$variavel = trim($linha);
			

			$stringe .= '
	if($_POST["'.$variavel.'"] != null)
	{
		$'.$this->Banco->getNome().'->set'.strtoupper(substr($variavel, 0, 1)).substr($variavel, 1, 100).'($_POST["'.$variavel.'"]);
	}
			
				';
			
			
			
			
		}

		$stringe .= '
$'.$this->Banco->getNome().'dao= new '.strtoupper(substr($this->Banco->getNome(), 0, 1)).substr($this->Banco->getNome(), 1, 100).'DAO();
$'.$this->Banco->getNome().'dao->inserir($'.$this->Banco->getNome().');';
		
		$stringe .= '?>';
		return $stringe;
		
	}
	



}


?>