<?php
require_once("cabecalho.php");
require_once("logica-usuario.php");

verificaUsuario();

$tipoProduto = $_POST["tipoProduto"];

$factory = new ProdutoFactory();

$produto = $factory->criaPor($tipoProduto, $_POST);

$produto->atualizaBaseadoEm($_POST);

$produtoDao = new ProdutoDao($conexao);



if($produtoDao->insereProduto($produto)) :
	$_SESSION["success"] = "Produto {$nome}, {$preco}, adicionado com sucesso!";
	header("Location: produto-lista.php");
else :
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Produto {$nome} não foi adicionado: {$msg}";
	header("Location: produto-formulario.php");
endif;
die();
