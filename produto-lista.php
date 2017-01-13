<?php
include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");

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
			</tr>
		</tbody>
<?php
endforeach
?>
</table>
<?php include("rodape.php");?>
