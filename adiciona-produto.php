<?php include("cabecalho.php"); ?>
	<?php 
		$nome =  $_GET["nome"];
		$preco = $_GET["preco"];
		$conexao = mysqli_connect('localhost', 'root', '', 'loja');
		$query = "insert into produtos (nome, preco) values ('{$nome}', {$preco})";
		$retorno_query = mysqli_query($conexao, $query);
		mysqli_close($conexao);
	?>
	<?php
		if($retorno_query) {
	?>
	<p class="alert-success">Produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!</p>
	<?php	
		} else {
	?>
	<p class="alert-danger">
		Produto <?=  $nome; ?>, <?= $preco; ?> não foi adicionado!
	</p>
	<?php
		}
	?>
<?php include("rodape.php"); ?>
	
