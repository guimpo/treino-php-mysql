<?php include("cabecalho.php"); ?>
	<?php 
		$nome =  $_GET["nome"];
		$preco = $_GET["preco"];
		$conexao = mysqli_connect('localhost', 'root', '', 'loja');
		$query = "insert into produtos (nome, preco) values ('{$nome}', {$preco})";
		mysqli_query($conexao, $query);
		mysqli_close($conexa);
	?>
	<p class="alert-success">
		Produto <?=  $nome; ?>, <?= $preco; ?> adicionado com sucesso!
	</p>
<?php include("rodape.php"); ?>
	
