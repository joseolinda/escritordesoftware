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
		<?php
		if ($_SESSION['meuSoftwareId'] && $_POST['nomedoobjeto']) 
		{ // vou fechar isso lá no final

			$objetodao = new ObjetoDAO();
			$conexao = Conexao::retornaConexaoComBanco();
			$objetodao->setConexao($conexao);
			
			$software = new Software ();
			$software->setId ($_SESSION['meuSoftwareId']);
			
		?>	
				
		<div id="esquerda">
			<?php
				$objeto = new Objeto();
				$objeto->setNome($_POST['nomedoobjeto']) ;
				$objeto->setPersistencia($_POST['persistencia']);
				if($objetodao->inserir($objeto, $software)){
					echo "Objeto inserido com sucesso!";
					echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=software.php?idsoftware='.$_SESSION['meuSoftwareId'].'">';
				}else{
					echo "Objeto não foi inserido";
					
					
				}
				
				
			
			
			
			?>
		</div>
		<div id="direita">
			
		</div>
		<?php
		}
		// fechando o if($_GET['idsoftware'])
		else{
			echo "Preencha o formulário Corretamente!";			
			echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=index.php">';
		}
		?>
			


	</div>

</body>
</html>