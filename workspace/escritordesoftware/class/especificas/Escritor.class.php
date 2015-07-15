<?php
/**
 *
 * @author jefferson
 *
 */

class Escritor{
	public $Site;

	public function setSite(Site $site){

		$this->Site = $site;

	}
	public function getSite()
	{
		return $this->Site;


	}

	public function geraSite()
	{
		$this->geraEstrutura();
		$this->geraIndex();
		$this->geraObjetos();
		$this->geraPersistencia();
		$this->geraClassConexao();



	}



	public function geraEstrutura()
	{
		$nomeDoSite = $this->Site->getNome();

		//pasta do programa
		$caminho = 'sites/'.$nomeDoSite ;

		$pastadoprograma = new Diretorio();
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();

		//pasta das classes
		$caminho = 'sites/'.$nomeDoSite .'/class';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();

		//Classes especificas para o programa
		$caminho ='sites/'.$nomeDoSite.'/class/especificas';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();

		//Pasta de arquivo de configuracao do MYSQL, Tabela de dados etc
		$caminho = 'sites/'.$nomeDoSite.'/class/appado';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();


		//pasta de formularios
		$caminho = 'sites/'.$nomeDoSite.'/forms';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();


		//pasta de arquivos responsaveis por exibicao de conteudo do Tabela de dados
		$caminho = 'sites/'.$nomeDoSite.'/exibir';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();

		//pasta de imagens
		$caminho ='sites/'.$nomeDoSite.'/img';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();

		//pasta de imagens
		$caminho ='sites/'.$nomeDoSite.'/css';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();

		//pasta de imagens
		$caminho ='sites/'.$nomeDoSite.'/js';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();
		
		
		
		//Vamos copiar a lista de arquivos das pastas appado e app.conf para dentro do software
		$copiador = new Copiador();


		

		$caminho_inicial = 'class/appado/TCriteria.class.php';
		$caminho_final = 'sites/'.$nomeDoSite.'/class/appado/TCriteria.class.php';
		$copiador->setCaminho_inicial($caminho_inicial);
		$copiador->setCaminho_final($caminho_final);
		$copiador->copiarArquivo();

		 
		$caminho_inicial = 'class/appado/TExpression.class.php';
		$caminho_final = 'sites/'.$nomeDoSite.'/class/appado/TExpression.class.php';
		$copiador->setCaminho_inicial($caminho_inicial);
		$copiador->setCaminho_final($caminho_final);
		$copiador->copiarArquivo();

		$caminho_inicial ='class/appado/TFilter.class.php';
		$caminho_final = 'sites/'.$nomeDoSite.'/class/appado/TFilter.class.php';
		$copiador->setCaminho_inicial($caminho_inicial);
		$copiador->setCaminho_final($caminho_final);
		$copiador->copiarArquivo();


		$caminho_inicial = 'class/appado/TSqlInstruction.class.php';
		$caminho_final = 'sites/'.$nomeDoSite.'/class/appado/TSqlInstruction.class.php';
		$copiador->setCaminho_inicial($caminho_inicial);
		$copiador->setCaminho_final($caminho_final);
		$copiador->copiarArquivo();


		$caminho_inicial = 'class/appado/TSqlInsert.class.php';
		$caminho_final = 'sites/'.$nomeDoSite.'/class/appado/TSqlInsert.class.php';
		$copiador->setCaminho_inicial($caminho_inicial);
		$copiador->setCaminho_final($caminho_final);
		$copiador->copiarArquivo();
		
		
		$caminho_inicial = 'class/appado/TSqlSelect.class.php';
		$caminho_final = 'sites/'.$nomeDoSite.'/class/appado/TSqlSelect.class.php';
		$copiador->setCaminho_inicial($caminho_inicial);
		$copiador->setCaminho_final($caminho_final);
		$copiador->copiarArquivo();
		


		
		
	}
	public function geraIndex()
	{
		$site = $this->Site;
		$nomeDoSite = $this->Site->getNome();
		$gerador = new GeradorDeCodigo();
		$gerador->setSite($this->Site);
		$index = $gerador->geraIndex();
		$arquivo = new Arquivo();
		$arquivo->setCaminho('sites/'.$nomeDoSite.'/index.php');
		$arquivo->setConteudo($index);
		$arquivo->criaArquivo();



	}
	public function geraObjetos()
	{
		$nomeDoSite = $this->Site->getNome();
		$softwares = $this->Site->getSoftwares();

		foreach ($softwares as $software)
		{
			foreach ($software->getObjetos() as $objeto)
			{
				$geradorDeCodigo = new GeradorDeCodigo();
				$geradorDeCodigo->setSite($this->Site);
				$geradorDeCodigo->geraObjeto($objeto);
				$codigo = $geradorDeCodigo->getCodigo();
				$caminho = $geradorDeCodigo->getNomeDoArquivo();
				$arquivo = new Arquivo();
				$arquivo->setCaminho($caminho);
				$arquivo->setConteudo($codigo);
				$arquivo->criaArquivo();

					
			}


		}

	}
	public function geraForms()
	{
		
		
		
	}

	/**
	 * A partir deste metodo o site podera ter persistencia
	 * Esse metodo cria objetos que fazem com que o objeto persista.
	 * ObjetoDAO
	 */
	public function geraPersistencia()
	{
		$nomeDoSite = $this->Site->getNome();
		$softwares = $this->Site->getSoftwares();
		foreach ($softwares as $software)
		{
			foreach ($software->getObjetos() as $objeto)
			{

				if($objeto->getPersistencia())
				{

					$geradorDeCodigo = new GeradorDeCodigo();
					$geradorDeCodigo->setSite($this->Site);
					$geradorDeCodigo->abreObjetoDAO($objeto);
					$geradorDeCodigo->geraConstrutorDoDAO();
					
					$geradorDeCodigo->abreMetodoInserir($objeto);
					$geradorDeCodigo->geraConteudoDeInserir($objeto);
					$geradorDeCodigo->fechaMetodoInserir($objeto);
					$geradorDeCodigo->retornaObjeto($objeto);
					
					$geradorDeCodigo->fechaObjetoDAO();
					
					
					
					$arquivo = new Arquivo();
					$conteudo = $geradorDeCodigo->getCodigo();
					$caminho = $geradorDeCodigo->getNomeDoArquivo();
					$arquivo->setConteudo($conteudo);
					$arquivo->setCaminho($caminho);
					$arquivo->criaArquivo();
					
					$paginas = new Arquivo();
					$geradorDeCodigo = new GeradorDeCodigo();
					$geradorDeCodigo->setSite($this->Site);
					$geradorDeCodigo->geraPaginas($objeto);
					$caminho = $geradorDeCodigo->getNomeDoArquivo();
					$conteudo = $geradorDeCodigo->getCodigo();
					$paginas->setCaminho($caminho);
					$paginas->setConteudo($conteudo);
					$paginas->criaArquivo();
					
					
					$formularios = new Arquivo();
					$geradorDeCodigo = new GeradorDeCodigo();
					$geradorDeCodigo->setSite($this->Site);
					$geradorDeCodigo->geraFormularios($objeto);
					$caminho = $geradorDeCodigo->getNomeDoArquivo();
					$conteudo = $geradorDeCodigo->getCodigo();
					$formularios->setCaminho($caminho);
					$formularios->setConteudo($conteudo);
					$formularios->criaArquivo();
					
					$arquivoInserir = new Arquivo();
					$geradorDeCodigo = new GeradorDeCodigo();
					$geradorDeCodigo->setSite($this->Site);
					$geradorDeCodigo->geraArquivoInserirObjeto($objeto);
					$caminho = $geradorDeCodigo->getNomeDoArquivo();
					$conteudo = $geradorDeCodigo->getCodigo();
	
					$arquivoInserir->setCaminho($caminho);
					$arquivoInserir->setConteudo($conteudo);
					$arquivoInserir->criaArquivo();
					
					
					
				}

			}
		}



	}
	
	public function geraPaginas()
	{
		

	}

	public function compactaSite()
	{

	}
	public function geraClassConexao()
	{
		$geradorDeCodigo = new GeradorDeCodigo();
		$geradorDeCodigo->setSite($this->Site);
		$geradorDeCodigo->abreClassConexao();
		$geradorDeCodigo->geraretornaConexaoComBanco();
		$geradorDeCodigo->geracriaBancoDeDados();
		$geradorDeCodigo->geraSqlGeradorDoBanco($this->Site);
		$geradorDeCodigo->fechaClassConexao();
		
	
		
		
		$codigo = $geradorDeCodigo->getCodigo();
		$caminho = $geradorDeCodigo->getNomeDoArquivo();
	
		
		
		$arquivo = new Arquivo();
		$arquivo->setCaminho($caminho);
		$arquivo->setConteudo($codigo);
		$arquivo->criaArquivo();
	
	
	
	}
}


?>