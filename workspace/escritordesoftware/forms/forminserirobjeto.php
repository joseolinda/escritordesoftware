
<form action="inserirobjeto.php" method="post">
	<fieldset>
		<legend> Formulário para adicionar objeto </legend>

		<input type="hidden" name="id_objeto" id="id_objeto" /> <label for="nome"> nome: </label>
		<input type="text" name="nome" id="nome" /> 
		<label for="id_software">Software: </label> 
		<select name="id_software" id="id_software">


			<?php
			 
			//Maquinaria e grande industria

			if(isset($_GET['software_id']))
			{
				$software = new Software();
				$software->setId($_GET['software_id']);
				
				$softwaredao = new SoftwareDAO();
				
				
				$software = $softwaredao->retornaSoftware($software);
				
				
				echo '<option value="'.$software->getId().'">'.$software->getNome().'</option>';
				

				

			}
			else
			{

				echo '<option selected>Selecione Um Software</option>';

			}
			
			$result0 = $softwaredao->retornaLista();
			foreach($result0 as $linha0){
			
			echo '<option value="'.$linha0['id_software'].'">'.$linha0['nome'].'</option>';
			}

			
			
			
			?>


		</select>
		
		<label for="persistencia">Persistência: </label>
		<select name="persistencia" id="persistencia">
			<option value="0">Não</option>
			<option value="1" selected>Sim</option>
		</select>
		
		<input type="submit" value="Adicionar Objeto">

	</fieldset>
</form>
