<?php
include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");

$nome =  $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria = $_POST["categoria_id"];
	if(insereProduto($conexao, $nome, $preco, $descricao, $categoria)) : 
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
	
