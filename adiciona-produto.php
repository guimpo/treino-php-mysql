<html>
	<head>
		<title>Minha Loja</title>
		<link rel="stylesheet" href="css/bootstrap">
		<link rel="stylesheet" href="css/loja.css">
	</head>

	<body>
		<div class="container">
			<div class="principal">
				<?php 
					$nome =  $_GET["nome"];
					$preco = $_GET["preco"];
				?>
			</div>
		</div>
		<p class="alert-sucess">
			Produto <?=  $nome; ?>, <?= $preco; ?> adicionado com sucesso!
		</p>
	</body>
</html>
