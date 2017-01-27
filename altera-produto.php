<?php
require_once("cabecalho.php");
require_once("logica-usuario.php");

verificaUsuario();
$tipoProduto = $_POST["tipoProduto"];

$produtoDao = new ProdutoDao($conexao);

$factory = new ProdutoFactory();

$produto = $factory->criaPor($tipoProduto, $_POST);

$produto->atualizaBaseadoEm($_POST);

$produto->setId($_POST["id"]);

if($produtoDao->alteraProduto($produto)) {
  header("Location: produto-lista.php");
  $_SESSION["success"] = "Produto {$produto->getNome()}, alterado!";
} else {
  header("Location: produto-lista.php");
  $_SESSION["danger"] = "Produto {$produto->getNome()}, não foi alterado!";
}

die();
