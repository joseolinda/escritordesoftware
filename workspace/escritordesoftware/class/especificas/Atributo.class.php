
<?php

class Atributo
{

	private $Nome = 'atributo';
	/**
	 *
	 * @var String
	 * Pode ser tipo predefinido
	 *
	 * Data: data
	 * Texto: text
	 * Inteiro: int
	 * Ponto Flutuante: float, double
	 * Booleano: boolan
	 * Objeto: objeto
	 *
	 *
	 */

	public $Tipo = 'text';
	/**
	 * 
	 * @var String
	 * padrão: n:n
	 * valores possiveis: 1:n, n:n
	 */
	public $TipoDeRelacionamento = 'n:n';
	public $Tamanho = '100';
	public $Indice = '-';
	public $Auto_increment = false;
	
	public function __construct($nome_do_atributo, $tipo_de_dado = 'text', $tipo_de_relacionamento = 'n:n', $tamanho = 100, $indice = '-', $auto_increment = false)
	{
		$this->Nome = $nome_do_atributo;
		$this->Tipo = $tipo_de_dado;
		
		
	}

	public function setNome($nome)
	{
		$nome = trim($nome);
		if (is_string($nome ))
		{
			$this->Nome= $nome;

		}
		else
		{
			echo '<br>Erro ao tentar atribuir nome de atributo';
		}
			
	}
	public function getNome()
	{
			
		return $this->Nome;
			
	}

	public function setTipo($tipo)
	{

		$tipo = trim($tipo);
		$this->Tipo= $tipo;
			

	}
	public function getTipo()
	{
			
		return $this->Tipo;
			
	}
	public function setTipoDeRelacionamento($tipo_de_relacionamento){
		$tipo_de_relacionamento = trim($tipo_de_relacionamento);
		if($tipo_de_relacionamento == '1:n' || $tipo_de_relacionamento == 'n:n')
		{
		$this->TipoDeRelacionamento = $tipo_de_relacionamento;
		}
	}
	public function getTipoDeRelacionamento(){
		return $this->TipoDeRelacionamento;
	}

	public function setTamanho($tamanho)
	{
			
		if(is_int($tamanho))
		{
			$this->Tamanho= $tamanho;
		}else
		{
			echo '<br>O tamanho deve ser um número Inteiro';
		}
			
	}
	public function getTamanho()
	{
			
		return $this->Tamanho;
			
	}

	public function setIndice($indice)
	{
			
		$this->Indice= $indice;
			
	}
	public function getIndice()
	{
			
		return $this->Indice;
			
	}

	public function setAuto_increment($auto_increment)
	{
			
		$this->Auto_increment= $auto_increment;
			
	}
	public function getAuto_increment()
	{
			
		return $this->Auto_increment;
			
	}
	public function tipoPredefinido()
	{

		/* Data: data
		 * Texto: text
		* Inteiro: int
		* Ponto Flutuante: float, double
		* Booleano: boolean
		*/
		if($this->Tipo != 'data' && $this->Tipo
				!= 'text' && $this->Tipo != 'int'
				&& $this->Tipo != 'float' &&
				$this->Tipo != 'double' && $this->Tipo != 'boolean')
		{
			return false;

		}
		else
		{
			return true;
		}

	}

}
?>