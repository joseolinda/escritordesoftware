<?php

/**
 * TCriteria
 * prove uma interface utilizada para definicao de criterios
 */

class TCriteria extends TExpression
{
	private $expressions; //lista de expressoes
	private $operators; //lista de operadores
	private $properties; //propriedade do criterio
	
	/**
	 * metodo add()
	 * adiciona uma expressao ao criterio
	 * @param $expression = expressao
	 * @param $operator = operador logico de comparacao
	 */
	public function add(TExpression $expression, $operator = self::AND_OPERATOR)
	{
		//na primeira vez, nao precisamos de operatdor logico para a concatenar
		if(empty($this->expressions))
		{
			unset($operator);
		}
		//agrega o resultado da expressao a lista de expressoes
		$this->expressions[] = $expression;
		$this->operators[] = $operator;
		
	}
	
	public function dump()
	{
		//concatena a lista de expressoes
		if(is_array($this->expressions))
		{
			foreach($this->expressions as $i=> $expression)
			{
				$operator = $this->operators[$i];
				$result .= $operator. ' ' . $expression->dump() . ' ';
				  
			}
			$result= trim($result);
			return "({$result})";
				
			
		}
	}
	public function setProperty($property, $value)
	{
		$this->properties[$property] = $value;
		
	}
	public function getProperty()
	{
		return $this->properties[$property];
	}
}

?>