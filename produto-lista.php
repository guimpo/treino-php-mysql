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
			<th>Valor</th>
			<th>Descrição</th>
			<th>Situação</th>
			<th>Categoria</th>
			<th>Alterar</th>
			<th>Remover</th>
		</tr>
	</thead>
	<?php foreach($produtos as $produto) : ?>
	<tbody>
		<tr>
			<td><?=$produto["nome"]?></td>
			<td><?=$produto["preco"]?></td>
			<td><?=$produto["descricao"]?></td>
			<?php $produtoUsado = $produto["usado"] == 1 ? "checked" : ""; ?>
			<td><input type="checkbox" disabled <?=$produtoUsado?>>Usado</td>
			<td><?=$produto["categoria_nome"]?></td>
				<form action="produto-altera-formulario.php" method="post">
					<td><button name="id" value="<?=$produto["id"]?>" class="btn btn-primary">Alterar</button></td>
			</form>
			<form action="remove-produto.php" method="post">
			<td><button name="id" value="<?=$produto["id"]?>" class="btn btn-danger">Remover</button></td>
			</form>
		</tr>
	</tbody>
	<?php endforeach ?>
</table>
<?php include("rodape.php"); ?>