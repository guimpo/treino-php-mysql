<?php
include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");
include("banco-produto.php");

$id = $_POST["id"];
$categorias = listaCategorias($conexao);
$produto = buscaProduto($conexao, $id);
?>
	<h1>Formulário de Alteração</h1>
	<form action="altera-produto.php" method="post">
		<table class="table">
			<tr>
				<td>Nome</td>
				<input type="hidden" name=id value=<?=$id?>>
				<td><input class="form-control" type="text" name="nome" value=<?=$produto["nome"]?>></td>
			</tr>
			<tr>
				<td>Preço</td>
				<td><input class="form-control" type="number" name="preco" value=<?=$produto["preco"]?>></td>
			</tr>
			<tr>
				<td>Descrição</td>
				<td><textarea name="descricao" class="form_control"><?=$produto["descricao"]?></textarea></td>
			</tr>
			<tr>
				<td>Situação</td>
				<?php $produtoUsado = $produto["usado"] == 1 ? "checked" : ""; ?>
				<td>
					<input type="checkbox" name="usado" value="true" <?=$produtoUsado?>>Usado
				</td>
			</tr>
			<tr>
				<td>Categorias</td>
				<td>
					<select name="categoria_id" class="form-control">
					<?php	foreach($categorias as $categoria):
						$select = ($categoria["id"] == $produto["categoria_id"] ? "selected" : "");?>
						<option value="<?=$categoria['id'];?>" <?=$select?>><?=$categoria["nome"];?></option>
					<?php	endforeach?>
					</select>
				</td>
			</tr>
			<tr>
				<td><input class="btn btn-primary" type="submit" value="Alterar" /></td>
			</tr>
		</table>
	</form>
<?php include("rodape.php"); ?>

