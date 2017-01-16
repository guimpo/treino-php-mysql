<?php
session_start();
function usuarioEstaLogado() {
	return isset($_SESSION["usuario_logado"]); 
}

function verificaUsuario() {
	if(!usuarioEstaLogado()) {
		header("Location: index.php?falhaDeSeguranca=1");
		die();
	}
}

function usuarioLogado() {
	return $_SESSION["usuario_logado"];
}

function logaUsuario($email) {
	$_SESSION["usuario_logado"] = $email;
	header("Location: index.php?login=1");
}

function logout() {
	session_destroy();
	header("Location: index.php?logout=true");
}

