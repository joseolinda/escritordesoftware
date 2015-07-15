<?php

/**
 * 
 * @author jefferson
 *
 */

class GeradorDeCodigoPHP extends GeradorDeCodigo{
	
	
	/**
	 * retorna um array de objetos do tipo GeradorDeCodigoPHP
	 * Cada estrutura representa um arquivo de uma classe do software em questao. 
	 * @param Software $software
	 * @return multitype:GeradorDeCodigoPHP |NULL
	 */
	public static function geraClasses(Software $software){
		//primeiro iremos percorrer cada um dos objetos deste software.
		//primeira vez pra criar os codigos
		 
		$listaDeObjetos = $software->getListaDeObjetos();
		if($listaDeObjetos){
			foreach ($listaDeObjetos as $objeto){
			
				//Gera o codigo de cada objeto
				//Gera o nome do arquivo
				$nomedosite = $software->getNome();

				//instancia no geradorDePHP
				//Armazena em Um vetor.
				$gerador = GeradorDeCodigoPHP::geraCodigoDeObjeto($objeto, $nomedosite);
			
			
				$geradores[] = $gerador;
			
			
			
			}
		}
		if(isset($geradores))
		{
			return $geradores;
		}
		else
		{
			return null;
		}
		
		
	
	
	}
	
	public static function geraFormularios(Software $software){
		//primeiro iremos percorrer cada um dos objetos deste software.
		//primeira vez pra criar os codigos
			
		$listaDeObjetos = $software->getListaDeObjetos();
		if($listaDeObjetos){
			foreach ($listaDeObjetos as $objeto){
					
				//Gera o codigo de cada objeto
				//Gera o nome do arquivo
				$nomedosite = $software->getNome();
	
				//instancia no geradorDePHP
				//Armazena em Um vetor.
				$gerador = GeradorDeCodigoPHP::geraForm($objeto, $software);
					
					
				$geradores[] = $gerador;
					
					
					
			}
		}
		if(isset($geradores))
		{
			return $geradores;
		}
		else
		{
			return null;
		}
	
	
	
	
	}
	
	/**
	 * Retorna uma estrutura que representa o codigo e o caminho de cada 
	 * Objeto responsável por insersao de objetos no banco de dados. 
	 * @param Software $software
	 * @return GeradorDeCodigoPHP|NULL
	 */
	
	
	public static function geraDaos(Software $software){

		$listaDeObjetos = $software->getListaDeObjetos();
		if($listaDeObjetos){
			foreach ($listaDeObjetos as $objeto){
					
				//Gera o codigo de cada objeto
				//Gera o nome do arquivo
				$nomedosite = $software->getNome();
		
				//instancia no geradorDePHP
				//Armazena em Um vetor.
				$gerador = GeradorDeCodigoPHP::geraCodigoDeObjetoDAO($objeto, $nomedosite);
					
					
				$geradores[] = $gerador;
					
					
					
			}
		}
		if(isset($geradores))
		{
			return $geradores;
		}
		else
		{
			return null;
		}
		
		
	}
	/**
	 * 
	 * Gera cada codigo individualmente de DAO
	 * @param Objeto $objeto
	 * @param String $nomeDoSite
	 * @return GeradorDeCodigoPHP
	 */
	public static function geraCodigoDeObjetoDAO(Objeto $objeto, $nomeDoSite){
		$geradorDeCodigo = new GeradorDeCodigoPHP();
		$nomeDoObjeto = strtolower($objeto->getNome());
		$nomeDoObjetoMA = strtoupper(substr($objeto->getNome(), 0, 1)).substr($objeto->getNome(), 1,100);
		$nomeDoObjetoDAO = strtoupper(substr($objeto->getNome(), 0, 1)).substr($objeto->getNome(), 1,100).'DAO';

		$codigo  = '
<?php
		
/**
* Classe feita para manipulação do objeto '.$nomeDoObjetoDAO.'
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class '.$nomeDoObjetoDAO.'
{
	private $conexao;

	public function setConexao(PDO $conexao){
		$this->conexao = $conexao;
	
	}
	public function getConexao(){
		return $this->conexao;
	}
	public function inserir('.$nomeDoObjetoMA.' $'.$nomeDoObjeto.' ){
		//Objetivo deste metodo é inserir um objeto no banco, fazendo-o ter persistencia.
		//utilizaremos a abstracao do SQL da classe TsqlInstruction
		//1. Foreach dos atributos . PRa cada existencia de atributo é um valor a ser adicionado.
		$instrucao = new TSqlInsert();
		$instrucao->setEntity("'.$nomeDoObjeto.'");
			
			';
	

	
		foreach($objeto->getAtributos() as $atributo){
			$nomeDoAtributo =  $atributo->getNome();
			$nomeDoAtributoMA = strtoupper(substr($nomeDoAtributo  , 0, 1)).substr($nomeDoAtributo ,1,100);
			$codigo .='
			
	
		if($'.$nomeDoObjeto.'->get'.$nomeDoAtributoMA.'()!= null)
		{

			$instrucao->setRowData("'.$nomeDoAtributo.'", $'.$nomeDoObjeto.'->get'.$nomeDoAtributoMA.'());

		}';
		}
		
		
		$codigo .= '

		echo $instrucao->getInstruction();

		if($this->Conexao->query($instrucao->getInstruction()))
		{
			return true;		
		}
		else
		{
			return false;
		}
		
		
	}
	public function deletar(){}
	public function alterar(){}
	
}
		';
		
		$gerador = new GeradorDeCodigoPHP();
		$gerador->codigo = $codigo;
		$gerador->caminho = 'sistemasphp/'.$nomeDoSite.'/class/especificas/'.$nomeDoObjetoDAO.'.class.php'; 
		return $gerador;
		
	}
	/**
	 * @param Objeto $objeto
	 * @return GeradorDeCodigoPHP
	 */
	public static function geraCodigoDeObjeto(Objeto $objeto, $nomeDoSite){
		$geradorDeCodigo = new GeradorDeCodigoPHP();
		$nomeDoObjeto = $objeto->getNome();
		$nomeDoObjetoMa = strtoupper(substr($objeto->getNome(), 0, 1)).substr($objeto->getNome(), 1,100);
		
		$codigo  = '
<?php
		
/**
* Classe feita para manipulação do objeto '.$nomeDoObjeto.'
* feita automaticamente com programa gerador de software inventado por
* @author Jefferson Uchôa Ponte
*
*
*/
class '.$nomeDoObjetoMa.'
{';
		if($objeto->getAtributos())
		{
			foreach ($objeto->getAtributos() as $atributo)
			{
				$nome = $atributo->getNome();
				$nome2 = strtoupper(substr($atributo->getNome(), 0, 1)).substr($atributo->getNome(), 1, 100);
		
				$codigo .= '
	private $'.$nome2.';';
		
			}
			
			
			foreach ($objeto->getAtributos() as $atributo)
			{//foreach dos atributos
				
			$nome = $atributo->getNome();
			$nome2 = strtoupper(substr($atributo->getNome(), 0, 1)).substr($atributo->getNome(), 1, 100);
			$tipo = $atributo->getTipo();
				
				
			if($atributo->getTipo() == 'int' || $atributo->getTipo() == 'float' || $atributo->getTipo() == 'string')
			{//o atributo nao eh objeto
			
			$codigo .= '
	public function set'.$nome2.'($'.$nome.')
	{
';
			$codigo .= '
		$this->'.$nome2.' = $'.$nome.';
			
	}
';
			}//fecha o atributo nao eh objeto
			else
			{//caso contrario, o atributo sendo objeto
			$codigo .= '
	public function set'.$nome2.'('.$atributo->getTipo().' $'.$nome.')
	{
';
			
			$codigo .= '
		$this->'.$nome2.' = $'.$nome.';
			
	}';
			}//fecha o caso contrario. o atributo sendo objeto
				
			$codigo .= '
	public function get'.$nome2.'()
	{
		return $this->'.$nome2.';
			
	}
			
';
				
			}//fecha foreach dos atributos
					
			
			
		}

		$codigo .='
} //encerrando a classe
?>';
		
		$geradorDeCodigo->codigo = $codigo;
		$geradorDeCodigo->caminho = 'sistemasphp/'.$nomeDoSite.'/class/especificas/'.strtoupper(substr($objeto->getNome(), 0, 1)).substr($objeto->getNome(),1,100).'.class.php';
		
		return $geradorDeCodigo;
	}
	
	
	public function geraIndex(Software $software){
		$this->caminho = "sistemasphp/".$software->getNome().'/index.php';
		$this->codigo = '<?php
//Funcao que inclui classe automaticamente no momento em que for instanciada. 
function __autoload($classe){


	if(file_exists("class/especificas/{$classe}.class.php"))
	{
		include_once "class/especificas/{$classe}.class.php";

	}elseif (file_exists("class/appado/{$classe}.class.php"))
	{
		include_once "class/appado/{$classe}.class.php";

	}


}
?>
<!DOCTYPE html>
<html>
  	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>'.$software->getNome().'</title>
	</head>
  	<body>
		<div id="topo">
			<h1>'.$software->getNome().'</h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="">Ítem do Menu</a></li>
				<li><a href="">Outro Ítem do Menu</a></li>
			</ul>
		</div>
		<div id="corpo">
			<div id="esquerda">Esta é a esquerda</div>
					
			<div id="direita">Esta é a direita</div>		
			
		</div>
		<div id="footer">
			<p>Base do site</p>
		</div>
					
		
	</body>
</html>';
		
	}
	public function geraStyle(Software $software){
		
		$this->caminho = "sistemasphp/".$software->getNome().'/css/style.css';
		$this->codigo = "/*Esse é um arquivo css*/
body{
	background-color:#5DD0C0;	
	font:Arial, Helvetica, sans-serif;
	color:#FFF;
	
	}

#topo{
	width: 1000px;
	height:223px;
	margin: 0px auto;
	padding: 0px 0px 0px 0px;
				
}

				
#menu{

	background-color:#00685A;
	width: 1000px;
	height:100px;
	margin: 0px auto;
	padding: 0px 0px 0px 0px;
				
	
}

#menu ul
{
	list-style: none;
}
				
#menu li
{
	display: inline-block;
	margin-top:5px;
	width:200px;
	height:30px;
}
#menu a{
	
	font-size:24px;	
	
}
				
#corpo{

	background-color:#00A08A;
	width: 1000px;
	height:1000px;
	margin: 0px auto;
	padding: 0px 0px 0px 0px;

	
	

	
}
#footer{

	background-color:#00A08A;
	width: 1000px;
	height:200px;
	margin: 0px auto;
	padding: 0px 0px 0px 0px;

				
	
}	
				
#esquerda{

	padding-left:10px;
	padding-right:10px;
	margin-left:20px;
	margin-top:40px;
	width:440px;
	float:left;
	background-color:#00685A;
	
}
#esquerda .classe {
	
	background-color:#00A08A;
	
}
#esquerda .classe li{
	
list-style: none;
	
}
#esquerda .classe h1{
	
	background-color:#1E786C;
	
}

#direita{
	padding-left:10px;
	padding-right:10px;
	margin-left:20px;
	margin-top:40px;
	width:440px;
	float:left;
	background-color:#00685A;
	
}



a{

	color:#FFF;	
	
	
}


fieldset{

	border:none;	
	
}

fieldset legend{

	font-size:30px;

	
}
label{
	font-size:30px;
	display: block;



}

input{

	margin-top:5px;
	margin-left:30px;
	border:none;
	width:300px;	
	height:30px;
	display: block;
	color: #00685A;
	font-size: 13px;
	
}
select{
	margin-top:5px;
	margin-left:30px;
	width:300px;	
	height:30px;
	border:none;	
	color: #00685A;
	font-size: 13px;
	
}



#topo img{
	
	margin-left:200px;
	margin-top:30px;



	
}			
				
";
		
	}
	
	public function geraCriadorDeBanco(Software $software){		
		$sgdb = $software->getBancoDeDados()->getSistemaGerenciadorDeBancoDeDados();
		
	}
	
	
	public static function geraForm(Objeto $objeto, Software $software){
		$nomeDOObjeto = strtolower($objeto->getNome());
		$nomeDoSite = $software->getNome();
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

			$indice = $atributo->getIndice();
			if($tipo == 'string' || $tipo == 'int' && $indice != 'primary_key'){
				$codigo .= '
						
		<label for="'.$variavel.'">'.$variavel.':</label>'.'
				
		<input type="text" name="'.$variavel.'" id="'.$variavel.'" />';
			}

		}
		
		
		$codigo .='
		
		<input type="submit" value="Cadastrar">
		
	</fieldset>
</form>';
		$gerador = new GeradorDeCodigoPHP();
		$gerador->caminho = 'sistemasphp/'.$nomeDoSite.'/forms/forminserir'.$nomeDOObjeto.'.php';
		$gerador->codigo = $codigo;
		return $gerador;
		
	
	}
	

	
}


?>