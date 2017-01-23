<?php require_once("cabecalho.php"); ?>

<form action="envia-contato.php" method="post" class="form-horizontal">
	<div class="form-group">
		<label for="nome" class="col-sm-2">Nome</label>
		<input id="nome" type="text" name="nome" placeholder="Nome" class="col-sm-10">
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2">Email</label>
		<input id="email" type="email" name="email" placeholder="Email" class="col-sm-10">
	</div>
	<div class="form-group">
		<label for="mensagem" class="col-sm-2">Mensagem</label>
		<div class="col-sm-10 email-fix-padding">
			<textarea id="mensagem" class="form-control" name="mensagem" rows="10"></textarea>
		</div>
	</div>
	<button type="submit" class="btn btn-default">Enviar</button>
</form>
<?php require_once("rodape.php"); ?>
