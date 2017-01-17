<?php
include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");
include("logica-usuario.php");

verificaUsuario();
?>
<?php
$categorias = listaCategorias($conexao);
$produto = array("nome" => "", "preco" => "", "descricao" => "", "categoria_id" => "1", "usado" => "");
?>
	<h1>Formulário de Cadastro</h1>
	<form action="adiciona-produto.php" method="post">
		<table class="table">
			<tr>
				<td>Nome</td>
					<?php include("produto-formulario-base.php"); ?>
					<select name="categoria_id" class="form-control">
					<?php	foreach($categorias as $categoria): ?>
						<option value="<?=$categoria['id'];?>"><?=$categoria["nome"];?></option>
					<?php	endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><input class="btn btn-primary" type="submit" value="Cadastrar" /></td>
			</tr>
		</table>
	</form>
<?php include("rodape.php"); ?>

