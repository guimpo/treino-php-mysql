<?php
require_once("cabecalho.php");


class ProdutoDao {

	private $conexao;

	function __construct($conexao) {
		$this->conexao = $conexao;
	}

	function listaProdutos() {
		$produtos = array();
		$query = "SELECT p.*, c.nome AS categoria_nome FROM produtos AS p JOIN categorias AS c ON c.id=p.categoria_id";
		$resultado = mysqli_query($this->conexao, $query);

		while($produto_array = mysqli_fetch_assoc($resultado)) {

			$categoria = new Categoria($produto_array["categoria_id"], $produto_array["categoria_nome"]);
			$produto = new Produto($produto_array["nome"], $produto_array["preco"],$produto_array["descricao"], $produto_array["usado"], $categoria);
			$produto->setId($produto_array["id"]);

			array_push($produtos, $produto);
		}
		return $produtos;
	}

	function insereProduto(Produto $produto) {
		$nome = mysqli_real_escape_string($this->conexao, $produto->getNome());
		$preco = mysqli_real_escape_string($this->conexao, $produto->getPreco());
		$descricao = mysqli_real_escape_string($this->conexao, $produto->getDescricao());
		$usado = mysqli_real_escape_string($this->conexao, $produto->getUsado());
		$categoria = mysqli_real_escape_string($this->conexao, $produto->getCategoria()->getId());

		$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria}, {$usado})";
		return  mysqli_query($this->conexao, $query);

	}

	function buscaProduto(Produto $produto) {
		$id = mysqli_real_escape_string($this->conexao, $produto->getid());
		$query = "SELECT * FROM produtos WHERE id = {$id}";
		$resultado =  mysqli_query($this->conexao, $query);
		$produto_array =  mysqli_fetch_assoc($resultado);
		$categoria = new Categoria($produto_array["categoria_id"], $nome);
		$produto = new Produto($produto_array["nome"], $produto_array["preco"],
													 $produto_array["descricao"], $produto_array["usado"],
													 $categoria);
		$produto->setId($produto_array["id"]);
		return $produto;
	}

	function alteraProduto(Produto $produto) {
		$id = mysqli_real_escape_string($this->conexao, $produto->getId());
		$nome = mysqli_real_escape_string($this->conexao, $produto->getNome());
		$preco = mysqli_real_escape_string($this->conexao, $produto->getPreco());
		$descricao = mysqli_real_escape_string($this->conexao, $produto->getDescricao());
		$usado = mysqli_real_escape_string($this->conexao, $produto->getUsado());
		$categoria = mysqli_real_escape_string($this->conexao, $produto->getCategoria()->getId());

		$query = "UPDATE produtos SET nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria}, usado = {$usado} WHERE id = {$id}";
		return mysqli_query($this->conexao, $query);
	}

	function removeProduto(Produto $produto) {
		$id = mysqli_real_escape_string($this->conexao, $produto->getId());
		$query = "DELETE FROM produtos WHERE id = {$id}";
		return mysqli_query($this->conexao, $query);
	}
}