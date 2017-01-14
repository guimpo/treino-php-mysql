<?php
include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");

$nome =  $_GET["nome"];
$preco = $_GET["preco"];
$descricao = $_GET["descricao"];

	if(insereProduto($conexao, $nome, $preco, $descricao)) : 
?>
<p class="text-success">Produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!</p>
<?php	
	else :
		$msg = mysqli_error($conexao);
?>
<p class="text-danger">
Produto <?=  $nome; ?>, <?= $preco; ?> não foi adicionado: <?= $msg ?>
</p>
<?php
	endif	
?>
<?php include("rodape.php"); ?>
	
