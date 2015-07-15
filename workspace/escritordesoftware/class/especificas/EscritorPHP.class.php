<?php



class EscritorPHP extends Escritor{
	
	/**
	 * criando cada pasta do software se ele for PHP.
	 * (non-PHPdoc)
	 * @see Escritor::criaEstrutura()
	 */
	public function escreverSoftware(){
		$this->criaEstrutura();
		$this->copiaArquivosImportantes();
		$this->criaClasses();
		$this->geraIndex();
		$this->criaStyle();
		$this->criaClassesDAO();
		$this->criaForms();
		
		
	}
	public function geraIndex(){
		$arquivo = new Arquivo();
		$gerador = new GeradorDeCodigoPHP();
		$gerador->geraIndex($this->software);
		$arquivo->setCaminho($gerador->getCaminho());
		$arquivo->setConteudo($gerador->getCodigo());
		$arquivo->criaArquivo();
		
		
	}
	public function criaEstrutura(){
		
		$nomeDoSite = $this->software->getNome();
		
		//pasta do programa
		$caminho = 'sistemasphp/'.$nomeDoSite ;
		
		$pastadoprograma = new Diretorio();
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();
		
		//pasta das classes
		$caminho = 'sistemasphp/'.$nomeDoSite .'/class';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();
		
		//Classes especificas para o programa
		$caminho ='sistemasphp/'.$nomeDoSite.'/class/especificas';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();
		
		//Pasta de arquivo de configuracao do MYSQL, Tabela de dados etc
		$caminho = 'sistemasphp/'.$nomeDoSite.'/class/appado';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();
		
		
		//pasta de formularios
		$caminho = 'sistemasphp/'.$nomeDoSite.'/forms';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();
		
		
		//pasta de arquivos responsaveis por exibicao de conteudo do Tabela de dados
		$caminho = 'sistemasphp/'.$nomeDoSite.'/exibir';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();
		
		//pasta de imagens
		$caminho ='sistemasphp/'.$nomeDoSite.'/img';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();
		
		//pasta de imagens
		$caminho ='sistemasphp/'.$nomeDoSite.'/css';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();
		
		//pasta de imagens
		$caminho ='sistemasphp/'.$nomeDoSite.'/js';
		$pastadoprograma->setCaminho($caminho);
		$pastadoprograma->geraDiretorio();
		
	}
	
	public function copiaArquivosImportantes(){
		//Vamos copiar a lista de arquivos das pastas appado e app.conf para dentro do software
		$copiador = new Copiador();
		$nomeDoSite = $this->software->getNome();
		
		
		
		$caminho_inicial = 'class/appado/TCriteria.class.php';
		$caminho_final = 'sistemasphp/'.$nomeDoSite.'/class/appado/TCriteria.class.php';
		$copiador->setCaminho_inicial($caminho_inicial);
		$copiador->setCaminho_final($caminho_final);
		$copiador->copiarArquivo();
		
			
		$caminho_inicial = 'class/appado/TExpression.class.php';
		$caminho_final = 'sistemasphp/'.$nomeDoSite.'/class/appado/TExpression.class.php';
		$copiador->setCaminho_inicial($caminho_inicial);
		$copiador->setCaminho_final($caminho_final);
		$copiador->copiarArquivo();
		
		$caminho_inicial ='class/appado/TFilter.class.php';
		$caminho_final = 'sistemasphp/'.$nomeDoSite.'/class/appado/TFilter.class.php';
		$copiador->setCaminho_inicial($caminho_inicial);
		$copiador->setCaminho_final($caminho_final);
		$copiador->copiarArquivo();
		
		
		$caminho_inicial = 'class/appado/TSqlInstruction.class.php';
		$caminho_final = 'sistemasphp/'.$nomeDoSite.'/class/appado/TSqlInstruction.class.php';
		$copiador->setCaminho_inicial($caminho_inicial);
		$copiador->setCaminho_final($caminho_final);
		$copiador->copiarArquivo();
		
		
		$caminho_inicial = 'class/appado/TSqlInsert.class.php';
		$caminho_final = 'sistemasphp/'.$nomeDoSite.'/class/appado/TSqlInsert.class.php';
		$copiador->setCaminho_inicial($caminho_inicial);
		$copiador->setCaminho_final($caminho_final);
		$copiador->copiarArquivo();
		
		
		$caminho_inicial = 'class/appado/TSqlSelect.class.php';
		$caminho_final = 'sistemasphp/'.$nomeDoSite.'/class/appado/TSqlSelect.class.php';
		$copiador->setCaminho_inicial($caminho_inicial);
		$copiador->setCaminho_final($caminho_final);
		$copiador->copiarArquivo();
		
		
	}
	public function criaClasses(){
		$software = $this->software;
		$vetorGeradores = GeradorDeCodigoPHP::geraClasses($software);
		if($vetorGeradores){
			
			foreach ($vetorGeradores as $gerador)
			{
				
				
				$arquivo = new Arquivo();
				$arquivo->setCaminho($gerador->getCaminho());
				$arquivo->setConteudo($gerador->getCodigo());
				$arquivo->criaArquivo();
				
				
				
			}
		}
		

		
		
	}
	public function criaForms(){
		$software = $this->software;
		$vetorGeradores = GeradorDeCodigoPHP::geraFormularios($software);
		if($vetorGeradores){
				
			foreach ($vetorGeradores as $gerador)
			{
		
		
				$arquivo = new Arquivo();
				$arquivo->setCaminho($gerador->getCaminho());
				$arquivo->setConteudo($gerador->getCodigo());
				$arquivo->criaArquivo();
		

		
		
			}
		}
		
		
		
		
	}
	public function criaClassesDAO(){
		
		$software = $this->software;
		$vetorGeradores = GeradorDeCodigoPHP::geraDaos($software);
		if($vetorGeradores){
				
			foreach ($vetorGeradores as $gerador)
			{
		
		
				$arquivo = new Arquivo();
				$arquivo->setCaminho($gerador->getCaminho());
				$arquivo->setConteudo($gerador->getCodigo());
				$arquivo->criaArquivo();
		
		
		
			}
		}
		
		
	}
	public function criaStyle(){
		$arquivo = new Arquivo();
		$gerador = new GeradorDeCodigoPHP();
		$gerador->geraStyle($this->software);
		
		$arquivo->setConteudo($gerador->getCodigo());
		$arquivo->setCaminho($gerador->getCaminho());
		$arquivo->criaArquivo();
			
	}
	
	
}

?>