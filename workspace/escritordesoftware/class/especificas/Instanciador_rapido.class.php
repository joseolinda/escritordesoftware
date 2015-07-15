
<?php

class Instanciador_rapido
{

	public $Nome_do_site = 'meu_site';
	public $Nome_do_software = 'meu_software';
	public $Nome_do_banco_de_dados = 'meu_banco_de_dados';
	public $Nome_do_objeto;
	public $String_de_atributos;
	public $String_de_tipos;
	public $Persistencia = true;
	

	public function setNome_do_site($nome_do_site){
		if(is_string($nome_do_site) && strlen($nome_do_site) > 1)
		{
			$this->Nome_do_site = $nome_do_site;
		}
		else
		{
			echo '<br>Erro ao tentar definir o nome do site<br>';
		}
	}
	public function getNome_do_site()
	{
		
		return $this->Nome_do_site;
		
	}
	public function setNome_do_software($nome_do_software)
	{
			
		$this->Nome_do_software= $nome_do_software;
			
	}
	public function getNome_do_software()
	{
			
		return $this->Nome_do_software;
			
	}

	public function setNome_do_banco_de_dados($nome_do_banco_de_dados)
	{
		
		$this->Nome_do_banco_de_dados = $nome_do_banco_de_dados;
		
		
	}
	public function getNome_do_banco_de_dados()
	{
		return $this->Nome_do_banco_de_dados;
	}
	public function setNome_do_objeto($nome_do_objeto)
	{
			
		$this->Nome_do_objeto= $nome_do_objeto;
			
	}
	public function getNome_do_objeto()
	{
			
		return $this->Nome_do_objeto;
			
	}

	public function setString_de_atributos($string_de_atributos)
	{
			
		$this->String_de_atributos= $string_de_atributos;
			
	}
	public function getString_de_atributos()
	{
			
		return $this->String_de_atributos;
			
	}

	public function setString_de_tipos($string_de_tipos)
	{
			
		$this->String_de_tipos= $string_de_tipos;
			
	}
	public function getString_de_tipos()
	{
			
		return $this->String_de_tipos;
			
	}
	public function setPersistencia($persistencia){
		$this->Persistencias = $persistencia;
	}
	public function getPersistencia(){
		return $this->Persistencia;
	}
	/**
	 * 
	 * @param Array Instanciador_rapido $instanciadores
	 */
	
	public static function instanciaObjetos($instanciadores)
	{
		$site = new Site();
		$software = new Software();
		$software->setNome('teste');
		$softwares = array($software);
		$site->setSoftwares($softwares);
		$banco_de_dados = new Banco_de_dados();
		$y = 0;
		foreach ($instanciadores as $instanciador)
		{
			
			
			$banco_de_dados->setNome($instanciador->Nome_do_banco_de_dados);
			$site->setNome($instanciador->Nome_do_site);
			$objeto = Instanciador_rapido::retornaObjeto($instanciador);
			$objetos[$y] = $objeto;
			$y = $y + 1;
			
		}
		$software->setObjetos($objetos);

		
		
		$site->setBanco_de_dados($banco_de_dados);
		
		$escritor = new Escritor();
		$escritor->setSite($site);
		$escritor->geraSite();
		
		
		
	}
	/**
	 * 
	 * @param Instanciador_rapido $instanciador
	 * @return Objeto
	 */
	public static function retornaObjeto(Instanciador_rapido $instanciador)
	{
		$objeto = new Objeto();
		$objeto->setNome($instanciador->getNome_do_objeto());
		
		$arraydeatributos = explode(',', $instanciador->String_de_atributos);
		$arraydetiosdeatributos = explode(',', $instanciador->String_de_tipos);
		$y = 0;
		foreach ($arraydeatributos as $nomeDeAtributo)
		{
			$atributo = new Atributo();
			$atributo->setNome($nomeDeAtributo);
			if(isset($arraydetiosdeatributos[$y]))
			{
			$atributo->setTipo($arraydetiosdeatributos[$y]);
			}
			$atributos[$y] = $atributo;
			$y = $y + 1;
		}
		
		$objeto->setPersistencia($instanciador->Persistencia);
		
		$objeto->setAtributos($atributos);
		return $objeto;
		
	}

}
?>