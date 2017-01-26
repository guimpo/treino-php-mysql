<?php
require_once("cabecalho.php");
require_once("logica-usuario.php");

verificaUsuario();
$tipoProduto = $_POST["tipoProduto"];

$produtoDao = new ProdutoDao($conexao);

$factory = new ProdutoFactory();

$produto = $factory->criaPor($tipoProduto, $_POST);

if($produtoDao->alteraProduto($produto)) {
  header("Location: produto-lista.php");
  $_SESSION["success"] = "Produto {$nome}, alterado!";
} else {
  header("Location: produto-lista.php");
  $_SESSION["danger"] = "Produto {$nome}, não foi alterado!";
}

die();
