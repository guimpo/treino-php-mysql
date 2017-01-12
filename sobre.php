<?php include("cabecalho.php")?>
	<p>Testando for</p>
	<form action="sobre.php">
		<input type="number" name="length"/>
		<input type="submit" value="Contar"/>
	</form>
	<?php
		$length = $_GET["length"];

		for($i = 0; $i < $length; $i++) {
			if($i % 2 == 0) {
	?>
				<div class="alert-success"><?= $i ?></div>
	<?php
			} else {
	?>
		<div class="alert-danger"><?= $i ?></div>
	<?php
			}
		}
	?>
<?php include("rodape.php")?>
