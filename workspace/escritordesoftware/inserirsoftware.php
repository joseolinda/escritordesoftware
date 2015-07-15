<?php

function __autoload($classe){


	if(file_exists("class/especificas/{$classe}.class.php"))
	{
		include_once "class/especificas/{$classe}.class.php";

	}elseif (file_exists("class/appado/{$classe}.class.php"))
	{
		include_once "class/appado/{$classe}.class.php";

	}


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Escritor De Software</title>
<link rel="stylesheet" type="text/css" href="style/style.css"/>
</head>

<body>

	<div id="topo">
    	<img src="images/logo.png" alt="" />
    </div>

	<div id="conteiner">
		<div id="esquerda">
        	<h1>Softwares Criados</h1>
            <ul>
	            <li><a href="software.php?software_id=10">Agenda</a></li>
    	        <li>GerenciadorDeArquivos</li>
            </ul>

        </div>
       	<div id="direita">
        	<h1>Criar Novo Software</h1>
            <?php 
            $conexao = Conexao::retornaConexaoComBanco();
            $softwaredao = new SoftwareDAO();
            $softwaredao->setConexao($conexao);
            
            $software = new Software();
            $software->setNome($_POST['nome_do_software']);
            $software->setLinguagem($_POST['linguagem']);
            
            $bancoDeDados = new BancoDeDados();
            $bancoDeDados->setSistemaGerenciadorDeBancoDeDados($_POST['sgdb']);
            $bancoDeDados->setHost($_POST['host']);
            $bancoDeDados->setNomeDoBanco($_POST['nome_do_banco']);
            $bancoDeDados->setPass($_POST['senha']);
            $bancoDeDados->setUsuario($_POST['usuario']);
            $software->setBancoDeDados($bancoDeDados);
            
            $idDoSoftware = $softwaredao->inserir($software);
            if($idDoSoftware){
				
				echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=software.php?idsoftware='.$idDoSoftware.'">';
			}else{
				
				echo "Aconteceu algum erro. Ah.. Tenta depois. ";
			}
            
            
            
            
            ?>
            

	    </div>

        
    </div>

</body>
</html>