<?php
require_once("cabecalho.php");
require_once("logica-usuario.php");

verificaUsuario();
$produtoDao = new ProdutoDao($conexao);
$nome =  $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria = new Categoria($_POST["categoria_id"], $_POST["categoria_nome"]);
$usado = $_POST["usado"];
$tipo = $_POST["tipo"];
$isbn = $_POST["isbn"];

if($tipo == "Livro") :
	$produto = new Livro($nome, $preco, $descricao, $usado, $categoria);
	$produto->setIsbn($isbn);
else :
	$produto = new Produto($nome, $preco, $descricao, $usado, $categoria);
endif;

if($produtoDao->insereProduto($produto)) :
	$_SESSION["success"] = "Produto {$nome}, {$preco}, adicionado com sucesso!";
	header("Location: produto-lista.php");
else :
	$msg = mysqli_error($conexao);
	$_SESSION["danger"] = "Produto {$nome} não foi adicionado: {$msg}";
	header("Location: produto-formulario.php");
endif;
die();
