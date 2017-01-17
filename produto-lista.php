<?php
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");

verificaUsuario();

if(isset($_SESSION["success"])) :
?>
<p class="alert-success"><?=$_SESSION["success"]?></p>
<?php
unset($_SESSION["success"]);
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
<?php require_once("rodape.php"); ?>
