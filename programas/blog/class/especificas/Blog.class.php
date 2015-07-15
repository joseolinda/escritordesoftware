 
<?php

class Blog
{
						
private $Titulo;

private $Corpo;

public function setTitulo($titulo)
{
					
$this->Titulo= $titulo;
							
}
public function getTitulo()
{
					
return $this->Titulo;
							
}
							
public function setCorpo($corpo)
{
					
$this->Corpo= $corpo;
							
}
public function getCorpo()
{
					
return $this->Corpo;
							
}
							
}
?>