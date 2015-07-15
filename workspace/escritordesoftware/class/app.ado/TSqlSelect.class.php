<?php


final class TSqlSelect extends TSqlInstruction
{
	public function addColumn($column)
	{
		$this->columns[] = $column;
		
		
	}
	public function getInstruction()
	{
		
		//monta a instrucao select
		$this->sql = 'SELECT ';
		$this->sql .= implode(', ', $this->columns);
		$this->sql .=' FROM ' . $this->entity;

		if($this->criteria)
		{

			$expression = $this->criteria->dump();
			if($expression)
			{
				$this->sql .= ' WHERE '. $expression;
				
				
			}
			//obtem as propreidades do criterio
			$order = $this->criteria->getProperty('order');
			$limit = $this->criteria->getProperty('limit');
			$offset = $this->criteria->getProperty('offset');
			
			//obtem a ordenacao select
			if($order)
			{
				$this->sql .=' ORDER BY '. $order;
				
			}
			if($limit)
			{
				$this->sql .=' LIMIT '. $limit;
				
			}
			if($offset)
			{
				$this->sql .= ' OFFSET '. $offset;
				
			}
			

			
			
			
		}
		return $this->sql;
		
		
		
	}

	
}


?>