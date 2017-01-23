<?php
require_once("cabecalho.php");
require_once("logica-usuario.php");

$produtoDao = new ProdutoDao($conexao);

$categoria = new Categoria($categoria_id, $categoria_nome);

$produto = new Produto($produto_nome, $produto_preco, $produto_descricao, $produto_usado, $categoria);

$produto->setId($_POST["id"]);

if($produtoDao->removeProduto($produto)) :
  header("Location: produto-lista.php");
  $_SESSION["success"] = "Produto removido!";
else :
  header("Location: produto-lista.php");
  $msg = mysqli_error($conexao);
  $_SESSION["danger"] = "Produto não foi removido: {$msg}";
endif;
die();
