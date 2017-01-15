<?php function listaProdutos($conexao) {
	$produtos = array();
	$query = "SELECT p.*, c.nome AS categoria_nome FROM produtos AS p JOIN categorias AS c ON c.id=p.categoria_id";
	$resultado = mysqli_query($conexao, $query);
	while($produto = mysqli_fetch_assoc($resultado)) {
		array_push($produtos, $produto);
	}
	return $produtos;
}

function insereProduto($conexao, $nome, $preco, $descricao, $categoria, $usado) {
	$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria}, {$usado})";
	return  mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {
	$query = "SELECT * FROM produtos WHERE id = {$id}";
	$resultado =  mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria, $usado) {
	$query = "UPDATE produtos SET nome = '{$nome}', preco = {$id}, descricao = '{$descricao}', categoria_id = {$categoria}, usado = {$usado} WHERE id = {$id}";
	return mysqli_query($conexao, $query);
}

function removeProduto($conexao, $id) {
	$query = "DELETE FROM produtos WHERE id = {$id}";
	return mysqli_query($conexao, $query);
}

