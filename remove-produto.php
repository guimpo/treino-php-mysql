<?php
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");

$categoria = new Categoria($categoria_id, $categoria_nome);
$produto = new Produto($produto_nome, $produto_preco, $produto_descricao, $produto_usado, $categoria);

$produto->setId($_POST["id"]);

if(removeProduto($conexao, $produto)) :
  header("Location: produto-lista.php");
  $_SESSION["success"] = "Produto removido!";
else :
  header("Location: produto-lista.php");
  $msg = mysqli_error($conexao);
  $_SESSION["danger"] = "Produto não foi removido: {$msg}";
endif;
die();
