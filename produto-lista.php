<?php
include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");

if(array_key_exists("removido", $_GET) && $_GET["removido"] =='true') :
?>
	<p class="alert-success">Produto removido</p>
<?php
endif;

$produtos = listaProdutos($conexao);
?>
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th>Produto</th>
				<th>Nome</th>
			</tr>
		</thead>
<?php
foreach($produtos as $produto) :
?>
		<tbody>
			<tr>
				<td><?= $produto["nome"] ?></td>
				<td><?= $produto["preco"] ?></td>
				<td ><a href="remove-produto.php?id=<?=$produto["id"];?>" class="text-danger">Remove</a></td>
			</tr>
		</tbody>
<?php
endforeach
?>
</table>
<?php include("rodape.php");?>
