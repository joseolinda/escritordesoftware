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
            <p>(Não use Acento ou caractere especial /%$#@&*, somente letras)</p>
            
            <form action="" method="post">
            	<fieldset>
                	<legend>Criar Novo Software</legend>
	                <label for="nome_do_software"> Nome do Software</label>
    	            <input type="text" id="nome_do_software" name="nome_do_software" />
                	<label for="linguagem">Linguagem</label>
                    <select id="linguagem" name="linguagem">
                    	<option value="php">PHP </option>
                    </select>
                    <label for="sgdb">Selecione o SGDB</label>
                    <select id="sgdb" name="sgdb">
                    	<option value="mysql">Mysql</option>
                    </select>
                    <input type="submit" value="Criar Software"  />
                    
                </fieldset>
            
            </form>

	    </div>

        
    </div>

</body>
</html>