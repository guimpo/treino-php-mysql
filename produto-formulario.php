<?php
require_once("cabecalho.php");
require_once("banco-categoria.php");
require_once("logica-usuario.php");

verificaUsuario();
?>
<?php
$categorias = listaCategorias($conexao);
$produto = new Produto($nome, $preco, $descricao, $usado, $categorias[0]);
?>
	<h1>Formulário de Cadastro</h1>
	<form action="adiciona-produto.php" method="post">
		<table class="table">
			<tr>
				<td>Nome</td>
					<?php require_once("produto-formulario-base.php"); ?>
					<select name="categoria_id" class="form-control">
					<?php	foreach($categorias as $categoria): ?>
						<option value="<?= $categoria->getId() ?>"><?= $categoria->getNome() ?></option>
					<?php	endforeach; ?>
					</select>
					<input type="hidden" name="categoria_nome" value="<?= $categoria->getNome() ?>">
				</td>
			</tr>
			<tr>
				<td>
					<input class="btn btn-primary" type="submit" value="Cadastrar">
				</td>
			</tr>
		</table>
	</form>
<?php require_once("rodape.php"); ?>
