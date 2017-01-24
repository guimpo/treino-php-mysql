<?php
require_once("cabecalho.php");
require_once("logica-usuario.php");

verificaUsuario();
$produtoDao = new ProdutoDao($conexao);
$categoria = new Categoria($_POST["categoria_id"], $categoria_nome);

$id = $_POST["id"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$usado = $_POST["usado"];
$tipo = $_POST["tipo"];
$isbn = $_POST["isbn"];

if($tipo == "Livro") :
  $produto = new Livro($nome, $preco, $descricao, $usado, $categoria);
  $produto->setId($id);
  $produto->setIsbn($isbn);
else :
  $produto = new Produto($nome, $preco, $descricao, $usado, $categoria);
  $produto->setId($id);
endif;

if($produtoDao->alteraProduto($produto)) {
  header("Location: produto-lista.php");
  $_SESSION["success"] = "Produto {$nome}, alterado!";
} else {
  header("Location: produto-lista.php");
  $_SESSION["danger"] = "Produto {$nome}, não foi alterado!";
}

die();
