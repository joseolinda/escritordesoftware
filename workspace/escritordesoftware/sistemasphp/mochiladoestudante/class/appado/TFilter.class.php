<?php
/**
 * classe TFIlter
 * Esta classe prove uma interface para definições de filtros de seleção
 */
class TFilter extends TExpression
{
	private $variable;
	private $operator;
	private $value;

	public function __construct($variable, $operator, $value)
	{
		$this->variable = $variable;
		$this->operator = $operator;
		//transforma o valor de acordo com certas regras
		//antes de atribuir a prorpeidade a this value
		$this->value = $this->transform($value);

	}
	/**
	 * Metodo transform()
	 * recebe um valor e faz as modificacoes necessarias
	 * para ele ser interpretado pelo banco de dados
	 * podendo ser um integer/string/boolean ou array
	 * @param $value = valor a ser transformado
	 */
	private function transform($value)
	{
		//caso seja um array
		if(is_array($value))
		{
			//percorre os valores
			foreach($value as $x){
				//se for um inteiro
				if(is_integer($x)){
					$foo[] = $x;
						
				}
				else if(is_string($x)){
					//se for string, adiciona aspas
					$foo[]="'$x'";
						
						
				}
			}
			//converte o array em string separada por ","
			$result = '(' . implode(',', $foo).')';


		}
		else if(is_string($value))
		{
			//adiciona apas
			$result = "'$value'";
				
		}else if(is_null($value))
		{
			$result = 'NULL';
				
		}else if(is_bool($value))
		{
			$result = $value ? 'TRUE' : 'FALSE';
				
		}else
		{
			$result = $value;
				
				
		}
		return $result;


	}
	/**
	 * Megodo dump()
	 * Retorna o filtro em forma de expressao
	 */
	public function dump()
	{
		return "{$this->variable} {$this->operator} {$this->value}";

	}

}

?>