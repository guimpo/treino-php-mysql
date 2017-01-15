<?php
function usuarioEstaLogado() {
	if(isset($_COOKIE["usuario_logado"])) {
		return 1;	
	} else {
		return 0;	
	}
}

function verificaUsuario() {
	if(!usuarioEstaLogado()) {
		header("Location: index.php?falhaDeSeguranca=1");
		die();	
	}
}
?>
