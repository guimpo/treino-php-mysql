<?php
include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");

$produtos = listaProdutos($conexao);
foreach($produtos as $produto) :
	echo $produto["nome"];
	echo $produto["preco"];
endforeach
?>
<?php include("rodape.php") ?>
