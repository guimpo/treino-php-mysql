<?php
require_once("banco-produto.php");
require_once("logica-usuario.php");

verificaUsuario();

$id = $_POST["id"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria = $_POST["categoria_id"];
$usado = array_key_exists("usado", $_POST) ? 1 : 2;

alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria, $usado);
header("Location: produto-lista.php");
$_SESSION["success"] = "Produto {$nome}, alterado!";
die();
?>






