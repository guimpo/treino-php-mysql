<?php
include("conecta.php");
include("banco-usuario.php");
include("logica-usuario.php");
$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);
if($usuario == null) {
	header("Location: index.php");
	$_SESSION["danger"] = "Usuário ou senha incorreta";
	die();
} else {
		logaUsuario($_POST["email"]);
}

