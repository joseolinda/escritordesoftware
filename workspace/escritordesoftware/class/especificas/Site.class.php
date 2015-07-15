
<?php
/**
 * Manipulação de objetos tipo Site
 * @author jefferson
 *
 */

class Site
{

	private $Nome= 'meu_site';
	private $Softwares;
	private $Banco_de_dados;

	
	public function __construct($nome_do_site, $arrayDeSoftwares, Banco_de_dados $banco_de_dados)
	{
		$this->Nome = $nome_do_site;
		$this->Softwares = $arrayDeSoftwares;
		$this->Banco_de_dados = $banco_de_dados;
		
	}


	public function setNome($nome)
	{
		$this->Nome = $nome;
	}
	public function getNome()
	{

		return $this->Nome;
	}
	public function setSoftwares($softwares)
	{
			
		$this->Softwares= $softwares;
			
	}
	public function getSoftwares()
	{
			
		return $this->Softwares;
			
	}

	public function setBanco_de_dados(Banco_de_dados $banco_de_dados)
	{
			
		$this->Banco_de_dados= $banco_de_dados;
			
	}
	public function getBanco_de_dados()
	{
			
		return $this->Banco_de_dados;
			
	}



	

}
?>