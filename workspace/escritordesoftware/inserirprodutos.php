<?php
session_start();
 
function __autoload($classe) {
	if (file_exists ( "class/especificas/{$classe}.class.php" )) {
		include_once "class/especificas/{$classe}.class.php";
	} elseif (file_exists ( "class/appado/{$classe}.class.php" )) {
		include_once "class/appado/{$classe}.class.php";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Escritor De Software</title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>

	<div id="topo">
		<img src="images/logo.png" alt="" />
	</div>

	<div id="conteiner">
		
		<div id="esquerda">
			<?php 
			
			if ($_SESSION['meuSoftwareId'] && $_POST['nomedoatributo'])
			{
				
				$atributo = new Atributo();
				$atributo->setNome($_POST['nomedoatributo']);
				$atributo->setTipo($_POST['tipodeatributo']);
				$atributo->setIndice($_POST['indice']);
				$atributo->setTipoDeRelacionamentoComObjeto($_POST['relacionamento_com_outro_tipo']);
				
				
				$objeto = new Objeto();
				$objeto->setId($_POST['objeto']);
				$objeto->addAtributo($atributo);
				
				$software = new Software();
				$software->setId($_SESSION['meuSoftwareId']);
				$software->addObjetoNaLista($objeto);
				
				$conexao = Conexao::retornaConexaoComBanco();
				$atributodao = new AtributoDAO();
				$atributodao->setConexao($conexao);
				if($atributodao->inserir($objeto, $atributo)){
					echo "Atributo Inserido Com sucesso!";
					echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=software.php?idsoftware='.$_SESSION['meuSoftwareId'].'">';
					
				}else{
					echo "Atributo Não Inserido";
					echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=software.php?idsoftware='.$_SESSION['meuSoftwareId'].'">';
				}
				
				
				
				

				
			}
			
			
			?>

			
			
		</div>
		<div id="direita">
			
		
		</div>


	</div>

</body>
</html>