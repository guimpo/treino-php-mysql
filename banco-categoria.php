<?php
require_once("conecta.php");

function listaCategorias($conexao) {
	$categorias = array();
	$query = "SELECT * FROM categorias;";
	$resultado = mysqli_query($conexao, $query);

	while($categoria_array = mysqli_fetch_assoc($resultado)) {
		$id = $categoria_array["id"];
		$nome = $categoria_array["nome"];
		$categoria = new Categoria($id, $nome);
		array_push($categorias, $categoria);
	}
	return $categorias;
}
?>
