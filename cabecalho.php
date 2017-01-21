<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<html>
	<head>
		<title>Minha Loja</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/loja.css">
	</head>
<?php
require_once("class/Produto.php");
require_once("class/Categoria.php");
require_once("mostra-alerta.php");
?>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Minha Loja</a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li><a href="produto-formulario.php">Adiciona Produto</a></li>
					<li><a href="sobre.php">Sobre</a></li>
					<li><a href="produto-lista.php">Produtos</a></li>
					<li><a href="contato.php">Contato</a></li>
				</ul>
			</div>
		</div>
	</div>
<div class="container">
<div class="principal">
<?php
mostraAlerta("danger");
mostraAlerta("success");
?>
