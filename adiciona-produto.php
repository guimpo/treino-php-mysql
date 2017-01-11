<?php include("cabecalho.php"); ?>
<?php 
	function insereProduto($conexao, $nome, $preco) {
		$query = "insert into produtos (nome, preco) values ('{$nome}', {$preco})";
		return  mysqli_query($conexao, $query);
	}

	$nome =  $_GET["nome"];
	$preco = $_GET["preco"];
	$conexao = mysqli_connect('localhost', 'root', '', 'loja');
	mysqli_close($conexao);
?>
<?php
		if(insereProduto($conexao, $nome, $preco)) {
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
	
