<?php
require_once("conecta.php");

function listaProdutos($conexao) {
	$produtos = array();
	$query = "SELECT p.*, c.nome AS categoria_nome FROM produtos AS p JOIN categorias AS c ON c.id=p.categoria_id";
	$resultado = mysqli_query($conexao, $query);
	while($produto = mysqli_fetch_assoc($resultado)) {
		array_push($produtos, $produto);
	}
	return $produtos;
}

function insereProduto($conexao, $produto) {
	$nome = mysqli_real_escape_string($conexao, $produto->getNome());
	$preco = mysqli_real_escape_string($conexao, $produto->getPreco());
	$descricao = mysqli_real_escape_string($conexao, $produto->getDescricao());
	$usado = mysqli_real_escape_string($conexao, $produto->getUsado());
	$categoria = mysqli_real_escape_string($conexao, $produto->getCategoria()->getId());
	$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria}, {$usado})";
	return  mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {
	$id = mysqli_real_escape_string($conexao, $id);
	$query = "SELECT * FROM produtos WHERE id = {$id}";
	$resultado =  mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria, $usado) {
	$nome = mysqli_real_escape_string($conexao, $nome);
	$preco = mysqli_real_escape_string($conexao, $preco);
	$descricao = mysqli_real_escape_string($conexao, $descricao);
	$categoria = mysqli_real_escape_string($conexao, $categoria);
	$query = "UPDATE produtos SET nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria}, usado = {$usado} WHERE id = {$id}";
	return mysqli_query($conexao, $query);
}

function removeProduto($conexao, $id) {
	$id = mysqli_real_escape_string($conexao, $id);
	$query = "DELETE FROM produtos WHERE id = {$id}";
	return mysqli_query($conexao, $query);
}
