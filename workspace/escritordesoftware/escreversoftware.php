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
		if ($_GET ['idsoftware']) {
		 // vou fechar isso lá no final
			$_SESSION['meuSoftwareId'] = $_GET['idsoftware'];
			$conexao = Conexao::retornaConexaoComBanco();
			
			$softwaredao = new SoftwareDAO();
			$softwaredao->setConexao($conexao);
			
			
			
			$software = new Software ();
			$software->setId ( $_GET ['idsoftware'] );
			
			$software = $softwaredao->retornaSoftwareDetalhado($software);
			
			
			?>	
				
		<div id="esquerda">

			<?php 
			echo '<h1>'.$software->getNome().'</h1>';
			echo '<h2>Informações:</h2>
				<p>Linguagem: '.$software->getLinguagem();
			
			if($software->getBancoDeDados()){
				echo '; Banco: '.$software->getBancoDeDados()->getSistemaGerenciadorDeBancoDeDados().'</p>';
			}
			?> 
			
			
			<h2>Objetos:</h2>

			<?php 
			if($software->getListaDeObjetos()){
			
				foreach ($software->getListaDeObjetos() as $objeto){
					
					echo '<div class="classe">
							<h1>'.$objeto->getNome().'</h1>
								<ul>';
					foreach ($objeto->getAtributos() as $atributo){
						
						if($atributo->getIndice() == "padrao"){
							echo '		<li>'.$atributo->getNome().' - '.$atributo->getTipo().'</li>';	
						}else
						{
							echo '		<li>'.$atributo->getNome().' - '.$atributo->getTipo().'; '.$atributo->getIndice() .'</li>';
						}
						 						


					}
					echo '</ul>';

					echo '</div>'; 
				}
				

			}
			
			
			switch ($software->getLinguagem()){
				case "php":
					$escritorPHP = new EscritorPHP();
					$escritorPHP->setSoftware($software);
					$escritorPHP->escreverSoftware();
					$zipador = new Zipador();
					$zipador->zipaArquivo('sistemasphp/'.$software->getNome(), 'sistemasphp/'.$software->getNome().'.zip');
					echo '<br><a href="sistemasphp/'.$software->getNome().'/index.php">Acessar Software</a><br>';
					echo '<a href="sistemasphp/'.$software->getNome().'.zip">Baixar Software</a>';
					
					break;
				case "java":
					echo "Ainda falta implementar as classes que criam java";
					//As classes deverao criar o codigo e compilar. 
					
					break;
				case "c":
					echo "Ainda falta implementar as classes que criam c";
					break;

				case "c++":
					echo "Ainda falta implementar as classes que criam c++";
					break;
				case "pyton":
					echo "Ainda falta implementar as classes que criam pyton";
					break;
			}
			
			
			
			
			?>
			
		</div>
		<div id="direita">
			
			<form action="insereobjeto.php" method="post">
			<fieldset>
			<legend>Inserir Objeto A Este Software</legend>
			<label for="nomedoobjeto">Nome do Objeto</label>
			<input type="text" id="nomedoobjeto" name="nomedoobjeto" />
			<label for="persistencia">Persistencia</label>
			<select name="persistencia" id="persistencia">
				<option value="banco">Banco De Dados</option>
			</select>
			<input type="submit" value="Inserir Objeto" />
			
			</fieldset>
			</form>
			<hr>
			<form action="insereatributo.php" method="post">
			<fieldset>
				<legend>Inserir Atributo a um Objeto</legend>
				<label for="nomedoatributo">Nome do Atributo</label>
				<input type="text" id="nomedoatributo" name="nomedoatributo" />
				<label for="objeto">Selecione um objeto</label>
				<select id="objeto" name="objeto" >
					
						<?php 
						if($software->getListaDeObjetos())
						{
			
						foreach ($software->getListaDeObjetos() as $objeto)
							{
								echo '<option value="'.$objeto->getId().'">'.$objeto->getNome().'</option>';
					
							}
						}
						?>
					
				</select>
				
				<label for="tipodeatributo">Tipo </label>
				<select id="tipodeatributo" name="tipodeatributo">
				
					<option>Texto</option>
					<option>Inteiro</option>
					<option>Ponto Flutuante</option>
					<?php 
						if($software->getListaDeObjetos())
						{
			
						foreach ($software->getListaDeObjetos() as $objeto)
							{
								echo '<option value="'.$objeto->getNome().'">'.$objeto->getNome().'</option>';
					
							}
						}
					?>
					
					
				</select>
				<label for="indice">Índice</label>
				
				<select id="indice" name="indice">
					<option value="padrao">Padrão</option>
					<option value="primary_key">Primary key</option>
				</select>
				<label for="relacionamento_com_outro_tipo">Relacionamento com outro tipo</label>
				<select name="relacionamento_com_outro_tipo" id="relacionamento_com_outro_tipo">
					<option value="padrao">Padrão</option>
					<option value="n:n">N:N</option>
					<option value="n:1">N:1</option>
					<option value="1:1">1:1</option>
		
				</select>

				<input type="submit" value="Inserir Atributo" />
				
			
			</fieldset>
			
			
			</form>


		</div>
	<?php
		}
		// fechando o if($_GET['idsoftware'])
		
		?>
			


	</div>

</body>
</html>