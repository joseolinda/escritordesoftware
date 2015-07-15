<?php


class Controlador{
	
	private $Banco;
	
	
	
	public function setBanco(Banco $banco){	
		$this->Banco = $banco;
	}
	
	
	public function geraSoftware(){
		if($this->Banco->getNome() != null)
		{
			
			//pasta do programa
			mkdir('programas/'.$this->Banco->getNome(), 0777, true);
			chmod('programas/'.$this->Banco->getNome(), 0777);
			
			//pasta das classes
			mkdir('programas/'.$this->Banco->getNome().'/class', 0777, true);
			chmod('programas/'.$this->Banco->getNome().'/class', 0777);
			
			//pasta das classes especificas desse programa
			mkdir('programas/'.$this->Banco->getNome().'/class/especificas', 0777, true);
			chmod('programas/'.$this->Banco->getNome().'/class/especificas', 0777);

			

			//Pasta de arquivo de configuracao do MYSQL, banco de dados etc
			mkdir('programas/'.$this->Banco->getNome().'/class/app.ado', 0777, true);
			chmod('programas/'.$this->Banco->getNome().'/class/app.ado', 0777);
				
			
			//pasta de formularios
			mkdir('programas/'.$this->Banco->getNome().'/forms', 0777, true);
			chmod('programas/'.$this->Banco->getNome().'/forms', 0777);

			//pasta de arquivos responsaveis por exibicao de conteudo do banco de dados
			mkdir('programas/'.$this->Banco->getNome().'/exibir', 0777, true);
			chmod('programas/'.$this->Banco->getNome().'/exibir', 0777);

				
			
				
				
			
			
			//cria o arquivo index.php
			$arquivo1 = new Arquivo();
			$arquivo1->setCaminho('programas/'.$this->Banco->getNome().'/index.php');
			$arquivo1->setConteudo('Novo software Criado por jefferson
					
					Serve para gerenciar '.$this->Banco->getNome().' \'s
					
					<br><br>
					formulario
					<?php
					include \'forms/forminserir'.$this->Banco->getNome().'.php\' ;
					
					?>
					');
			$arquivo1->criaArquivo();

			
			//Estabelece o conteudo da primeira classe, objeto principal
			$escritor = new Escritor();
			$escritor->setBanco($this->Banco);
			$classe1 = $escritor->criaSetEGet();
			
			//cria a primeira classe
			$arquivo1 = new Arquivo();
			$arquivo1->setCaminho('programas/'.$this->Banco->getNome().'/class/especificas/'.strtoupper(substr($this->Banco->getNome(), 0, 1)).substr($this->Banco->getNome(), 1, 100).'.class.php');
			$arquivo1->setConteudo($classe1);
			$arquivo1->criaArquivo();
			
			
			
			
			//Estabelece o conteudo da primeira classe DAO, 
			//classe que relaciona o objeto principal com o banco de dados
			
			$escritor = new Escritor();
			$escritor->setBanco($this->Banco);
			$classeDAO = $escritor->criaDAO();
				
			//cria a classe que relaciona com banco de dados
			$arquivoDAO = new Arquivo();
			$arquivoDAO->setCaminho('programas/'.$this->Banco->getNome().'/class/especificas/'.strtoupper(substr($this->Banco->getNome(), 0, 1)).substr($this->Banco->getNome(), 1, 100).'DAO.class.php');
			$arquivoDAO->setConteudo($classeDAO);
			$arquivoDAO->criaArquivo();
			
			
			//Vamos copiar a lista de arquivos das pastas app.ado e app.conf para dentro do software
			copy('class/app.ado/Conexao.class.php', 'programas/'.$this->Banco->getNome().'/class/app.ado/Conexao.class.php');
			copy('class/app.ado/TCriteria.class.php', 'programas/'.$this->Banco->getNome().'/class/app.ado/TCriteria.class.php');
			copy('class/app.ado/TExpression.class.php', 'programas/'.$this->Banco->getNome().'/class/app.ado/TExpression.class.php');
			copy('class/app.ado/TFilter.class.php', 'programas/'.$this->Banco->getNome().'/class/app.ado/TFilter.class.php');
			copy('class/app.ado/TSqlInstruction.class.php', 'programas/'.$this->Banco->getNome().'/class/app.ado/TSqlInstruction.class.php');
			copy('class/app.ado/TSqlInsert.class.php', 'programas/'.$this->Banco->getNome().'/class/app.ado/TSqlInsert.class.php');
				
			
			//Estabelece o conteudo da primeira classe, objeto principal
			$escritor = new Escritor();
			$escritor->setBanco($this->Banco);
			$forminserir = $escritor->criaFormInserirObjeto();
				
			//cria o arquivo do formulario
			$arquivo1 = new Arquivo();
			$arquivo1->setCaminho('programas/'.$this->Banco->getNome().'/forms/forminserir'.$this->Banco->getNome().'.php');
			$arquivo1->setConteudo($forminserir);
			$arquivo1->criaArquivo();

			
			//Estabelece o conteudo do arquivo inseridor do objeto
			$escritor = new Escritor();
			$escritor->setBanco($this->Banco);
			$inserirObjeto = $escritor->criaInserirObjeto();
			
			//cria o arquivo do formulario
			$arquivo1 = new Arquivo();
			$arquivo1->setCaminho('programas/'.$this->Banco->getNome().'/inserir_'.$this->Banco->getNome().'.php');
			$arquivo1->setConteudo($inserirObjeto);
			$arquivo1->criaArquivo();
				
				
			
		}else
		{
			echo 'Erro';
		}

		
		
	}
	
	
	
	
}




?>