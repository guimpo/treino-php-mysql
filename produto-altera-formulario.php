<?php
require_once("cabecalho.php");
require_once("banco-categoria.php");

$produtoDao = new ProdutoDao($conexao);

$categoria = new Categoria($categoria_id, $categoria_nome);
$produto = new Produto($nome, $preco, $descricao, $usado, $categoria);
$produto->setId($_POST["id"]);

$categorias = listaCategorias($conexao);

$produto = $produtoDao->buscaProduto($produto);

?>
	<h1>Formulário de Alteração</h1>
	<form action="altera-produto.php" method="post">
		<table class="table">
			<tr>
				<td>Nome</td>
				<input type="hidden" name=id value=<?= $produto->getId() ?>>
					<?php
						require_once("produto-formulario-base.php");
					?>
					<select name="categoria_id" class="form-control">
					<?php
						foreach($categorias as $categoria):
							$selecionado = ($categoria->getId() == $produto->getCategoria()->getId() ? "selected" : "");
					?>
							<option value="<?= $categoria->getId() ?>" <?= $selecionado ?>>
								<?=$categoria->getNome() ?>
							</option>
					<?php	endforeach?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input class="btn btn-primary" type="submit" value="Alterar">
				</td>
			</tr>
		</table>
	</form>
<?php require_once("rodape.php"); ?>
