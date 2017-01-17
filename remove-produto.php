<?php
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");

$id = $_POST["id"];
removeProduto($conexao, $id);
header("Location: produto-lista.php");
$_SESSION["success"] = "Produto removido!";
die();
