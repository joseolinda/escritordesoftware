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
<link
	href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700"
	rel="stylesheet" type="text/css" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="logo">
				<h1>
					<a href="#">Escritor de Software</a>
				</h1>
				<p>
					Frase de Efeito <a href="http://www.freecsstemplates.org/"
						rel="nofollow"></a>
				</p>
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

				<?php


				if(isset($_GET['software_id']))
				{
					echo '<div id="column1">';

					$software = new Software();
					$software->setId($_GET['software_id']);
					$softwareDao = new SoftwareDAO();
					$software = $softwareDao->retornaSoftware($software);

					print_r($software);
					echo '<h2>Software Selecionado: '.$software->getNome().'</h2>';

					if($software->getArrayDeObjetos() != null){
						echo '<p>Seus objetos:</p>';
						echo '<ul>';
						foreach ($software->getArrayDeObjetos() as $linha)
						{
							
							
							echo '<li>'.$linha->getNome().'</li>';
							echo '<ul>';
							foreach ($linha->getArray_de_atributos() as $linha_atributo){
								echo '<li>'.$linha_atributo->getNome().'('.$linha_atributo->getTipo().')</li>';
								
							}
							echo '</ul>';
						}
						echo '</ul>';
						}
						echo '
			</div>
			<div id="column2">
			<h2>Adicionar Objeto a um Software</h2>';
						include 'forms/forminserirobjeto.php';
						echo '
		</div>
		<div id="column3">
		<h2>Adicionar Atributo a Um Objeto</h2>';
							

						//tem que oferecer o novo atributo para um objeto especifico.
						//entao precisamos mostrar a lista de objetos como option no form.
						//mas que lista de objetos, de todos os softwares? Não, apenas deste software.
						//já está carregado
						if($software->getArrayDeObjetos() != null)
						{
							
							
							
							
							
							echo '
									<form action="inseriratributo.php" method="post">
										<fieldset>
											<legend>
												Formulário para adicionar atributo
											</legend>
				
											<input type="hidden" name="id" id="id" />
				
											<label for="nome">
												Nome:
											</label>
											<input type="text" name="nome" id="nome" />

											<label for="tipo">
												Tipo:
											</label>
											<select  name="tipo" id="tipo" >
												<option value="texto">Texto</option>
												<option value="texto_longo">Texto Longo</option>
												<option value="int">Inteiro</option>
												<option value="float">Números Decimais</option>
												<option value="objeto">Objeto</option>
											</select>
			
											<label for="tamanho">
												Tamanho:
											</label>
											<input type="text" name="tamanho" id="tamanho" />
			
			
			
											<label for="id_objeto">
												Objeto:
											</label>
											<select name="id_objeto" id="id_objeto">';

							foreach ($software->getArrayDeObjetos() as $objeto)
							{
								echo '<option value="'.$objeto->getId().'">'.$objeto->getNome().'</option>';
								
							}
											
									echo '	</select> 
			
			
											<input type="submit" value="Cadastrar">
			
											</fieldset>
										</form>';


						}



						echo '</div>';


				}





				?>



			</div>
		</div>
	</div>
	<div id="footer">
		<p>Designer e Programação de MVLINE</p>
	</div>
</body>
</html>
