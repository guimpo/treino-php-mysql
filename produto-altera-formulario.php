<?php
require_once("cabecalho.php");
require_once("banco-categoria.php");
require_once("banco-produto.php");

$id = $_POST["id"];
$categorias = listaCategorias($conexao);
$produto = array();
$produto = buscaProduto($conexao, $id);
?>
	<h1>Formulário de Alteração</h1>
	<form action="altera-produto.php" method="post">
		<table class="table">
			<tr>
				<td>Nome</td>
				<input type="hidden" name=id value=<?=$id?>>
					<?php
						require_once("produto-formulario-base.php");
					?>
					<select name="categoria_id" class="form-control">
					<?php
						foreach($categorias as $categoria):
							$selecionado = ($categoria["id"] == $produto["categoria_id"] ? "selected" : "");
					?>
						<option value="<?=$categoria['id'];?>" <?=$selecionado?>><?=$categoria["nome"];?></option>
					<?php	endforeach?>
					</select>
				</td>
			</tr>
			<tr>
				<td><input class="btn btn-primary" type="submit" value="Alterar" /></td>
			</tr>
		</table>
	</form>
<?php require_once("rodape.php"); ?>

