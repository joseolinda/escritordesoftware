<?php
class Diretorio {
	public $Caminho;
	public function setCaminho($caminho) {
		if (is_string ( $caminho ) && strlen ( $caminho ) > 1) {
			$arrayPastas = explode ( '/', $caminho );
			$x = 0;
			foreach ( $arrayPastas as $pasta ) {
				if ($x == 0) {
					$nova_pasta = preg_replace ( "/[^a-zA-Z0-9]/", "", $pasta );
				} elseif ($x > 0) {
					$nova_pasta .= '/' . preg_replace ( "/[^a-zA-Z0-9]/", "", $pasta );
				}
				
				$x = $x + 1;
			}
			$this->Caminho = $nova_pasta;
		} else {
			echo '<br><b>Erro</b> ao tentar atribuir caminho de diretorio';
		}
	}
	public function getCaminho() {
		return $this->Caminho;
	}
	
	/**
	 * Metodo sem retorno, tenta criar um diretorio
	 */
	public function geraDiretorio() {
		if (is_dir ( $this->Caminho )) {
			echo '<br><b>Diretório:</b> ' . $this->Caminho . ' já existe.<br>';
		} else {
			mkdir ( $this->Caminho, 0777, true );
			chmod ( $this->Caminho, 0777 );
			echo '<br><b>Diretório:</b>  ' . $this->Caminho . ' foi criado<br>';
		}
	}
}

?>