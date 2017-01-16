<?php
include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");
include("logica-usuario.php");

$id = $_POST["id"];
removeProduto($conexao, $id);
header("Location: produto-lista.php");
$_SESSION["success"] = "Produto removido!";
die();
