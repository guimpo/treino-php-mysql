<?php include("cabecalho.php"); 
include("logica-usuario.php"); ?>

<?php if(isset($_SESSION["success"])): ?>
	<p class="alert-success"><?=$_SESSION["success"]?></p>
<?php unset($_SESSION["success"]);
endif; ?>

<?php if(isset($_SESSION["danger"])): ?>
	<p class="alert-danger"><?=$_SESSION["danger"]?></p>
<?php
unset($_SESSION["danger"]);
endif; ?>

<?php if(usuarioEstaLogado()): ?>
<p class="text-success">Você está logado como <?=$_SESSION["usuario_logado"]?></p>
<a href="logout.php">Deslogar</a>
<?php endif; ?>

<h1>Bem vindo!</h1>

<?php if(usuarioEstaLogado()): ?>
<?php else: ?>
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
<?php endif; ?>
<?php include("rodape.php"); ?>
