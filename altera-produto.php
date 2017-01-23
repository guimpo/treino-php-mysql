<?php
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");

verificaUsuario();

$id = $_POST["id"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$usado = $_POST["usado"];
$categoria = new Categoria($_POST["categoria_id"], $categoria_nome);

$produto = new Produto($nome, $preco, $descricao, $usado, $categoria);
$produto->setId($id);

if(alteraProduto($conexao, $produto)) {
  header("Location: produto-lista.php");
  $_SESSION["success"] = "Produto {$nome}, alterado!";
} else {
  header("Location: produto-lista.php");
  $_SESSION["danger"] = "Produto {$nome}, não foi alterado!";
}


die();
