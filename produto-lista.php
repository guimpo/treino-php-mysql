<?php
require_once("cabecalho.php");
require_once("logica-usuario.php");

verificaUsuario();
$produtoDao = new ProdutoDao($conexao);
$produtos = $produtoDao->listaProdutos();
?>
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>Produto</th>
			<th>Preço</th>
			<th>Desconto</th>
			<th>Imposto</th>
			<th>Descrição</th>
			<th>Usado?</th>
			<th>Categoria</th>
			<th>Tipo</th>
			<th>ISBN</th>
			<th>Alterar</th>
			<th>Remover</th>
		</tr>
	</thead>
	<?php foreach($produtos as $produto) : ?>
	<tbody>
		<tr>
			<td><?= $produto->getNome() ?></td>
			<td><?= $produto->getPreco() ?></td>
			<td><?= $produto->precoComDesconto(0.5) ?></td>
			<td><?= $produto->calculaImposto() ?></td>
			<td><?= $produto->getDescricao() ?></td>
			<?php $produtoUsado = $produto->getUsado() == 1 ? "checked" : ""; ?>
			<td><input type="checkbox" disabled <?= $produtoUsado ?>>Usado</td>
			<td><?=	$produto->getCategoria()->getNome() ?></td>
			<td><?= $produto->getTipo() ?></td>
			<td><?= $produto->isLivro() ? $produto->getIsbn() : "" ?></td>
			<form action="produto-altera-formulario.php" method="post">
				<td>
					<button name="id" value="<?= $produto->getId() ?>" class="btn btn-primary">Alterar</button>
				</td>
			</form>
			<form action="remove-produto.php" method="post">
				<td>
					<button name="id" value="<?= $produto->getId() ?>" class="btn btn-danger">Remover</button>
				</td>
			</form>
		</tr>
	</tbody>
	<?php endforeach ?>
</table>
<?php require_once("rodape.php"); ?>
