<?php include("cabecalho.php"); ?>
	<h1>Bem vindo!</h1>
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
<?php include("rodape.php"); ?>
