<?php include("cabecalho.php"); ?>
<?php include("logica-usuario.php"); ?>
<?php $usuario = usuarioLogado(); ?>
<?php
if(isset($_GET["logout"]) && $_GET["logout"] == true) {
?>
<p class="alert-success">Deslogado com sucesso</p>
<?php } ?>
<?php
if(isset($_GET["falhaDeSeguranca"])) {
?>
<p class="alert-danger">Vocẽ não tem acesso a esta funcionalidade</p>
<?php
} 
?>
<?php
if(usuarioEstaLogado()) {
?>
<p class="alert-success">Você está logado!</p>
<p class="text-success">Você está logado como <?=$usuario?></p>
<a href="logout.php">Deslogar</a>
<?php
}
?>
<?php
if(isset($_GET["login"]) && $_GET["login"]==0) {
?>
<p class="alert-danger">Usuário ou senha incorreta</p>
<?php
}
?>
<h1>Bem vindo!</h1>
<?php
if(usuarioEstaLogado()) {
?>
<?php
} else {
?>
<table class="table">
	<form action="login.php" method="post">
		<tr>
			<td>Email</td>
				<td><input type="email" name="email" class="form-control"></td>
		</tr>
		<tr>
			<td>Senha</td>
			<td><input type="password" name="senha" class="form-control"></td>
		</tr>
		<tr>
			<td><button class="btn btn-primary" type="submit" class="form-control">Logar</button></td>
		</tr>
	</form>
</table>
<?php } ?>
<?php include("rodape.php"); ?>
