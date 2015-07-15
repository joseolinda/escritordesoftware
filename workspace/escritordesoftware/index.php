<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : WaterDrop 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130505

-->
<html>
<head>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Escritor de Software</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700" rel="stylesheet" type="text/css" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#">Escritor de Software</a></h1>
			<p>Frase de Efeito <a href="http://www.freecsstemplates.org/" rel="nofollow"></a></p>
		</div>
	</div>
	<!--
	<div id="menu">
	  
		<ul>
			<li ><a href="#">Home</a></li>
			<li class="current_page_item"><a href="#">Coleção</a></li>
			<li><a href="#">Loja Virtual</a></li>
			<li  ><a href="#">Blog</a></li>
			<li><a href="#">Contato</a></li>


		</ul>
		
		
	</div>
	
	
	<div id="banner"><img src="images/header-image-bg.jpg" width="1200" height="400" alt="" /></div>
	-->
	
	<div id="three-columns">
		<div class="content">
			<div id="column1">
				<h2>Novo Software</h2>
				<?php 
				include 'forms/forminserirsoftware.php';
				echo '<br><h2>Softwares Já Criados</h2>';
				
				$softwaredao = new SoftwareDAO();
				$result = $softwaredao->retornaLista();
				echo '<br><ul>';
				foreach ($result as $linha){
					
					echo '<li><a href="software.php?software_id='.$linha['id_software'].'">'.$linha['nome'].'</a></li>';
				}
				
				echo '</ul>';
				
				?>
				
			</div>
			<div id="column2">
			<!-- 
				<h2>Novo Objeto</h2>
				
				 -->
			</div>
			<div id="column3">
			<!-- 
				<h2>Novo Atributo</h2>
			-->
				
			</div>
		</div>
	</div>
</div>
<div id="footer">
	<p>Designer e Programação de MVLINE</p>
</div>
</body>
</html>
