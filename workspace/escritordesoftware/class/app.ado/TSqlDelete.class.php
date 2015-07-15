<?php

final class TSqlDelete extends TSqlInstruction
{
	public function getInstruction()
	{
		//monta a string delet
		$this->sql = "DELET from {$this->entity}";
		if($this->criteria)
		{
			$expression = $this->criteria->dump();
			if($expression)
			{
				$this->sql .=' WHERE ' . $expression;
				
			}
			
		}
		return $this->sql;
		
	}
}


?>