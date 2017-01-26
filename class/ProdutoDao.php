<?php
require_once("cabecalho.php");


class ProdutoDao {

	private $conexao;

	function __construct($conexao) {
		$this->conexao = $conexao;
	}

	function listaProdutos() {
		$produtos = array();
		$query = "SELECT p.*, c.nome AS categoria_nome
							FROM produtos AS p
							JOIN categorias AS c
							ON c.id=p.categoria_id";
		$resultado = $this->conexao->query($query);

		while($produto_array = mysqli_fetch_assoc($resultado)) {

			$categoria = new Categoria($produto_array["categoria_id"], $produto_array["categoria_nome"]);

			$tipoProduto = $produto_array["tipo_produto"];
			$factory = new ProdutoFactory();
			$produto = $factory->criaPor($tipoProduto, $produto_array);
			$produto->atualizaBaseadoEm($produto_array);
			$produto->setId($produto_array["id"]);

			array_push($produtos, $produto);
		}
		return $produtos;
	}

	function insereProduto(Produto $produto) {
		$nome = $this->conexao->real_escape_string($produto->getNome());
		$preco = $this->conexao->real_escape_string($produto->getPreco());
		$descricao = $this->conexao->real_escape_string($produto->getDescricao());
		$usado = $this->conexao->real_escape_string($produto->getUsado());
		$categoria = $this->conexao->real_escape_string($produto->getCategoria()->getId());
		$tipo = $this->conexao->real_escape_string($produto->getTipo());

		if($produto->isLivro()) :
			$isbn = $this->conexao->real_escape_string($produto->getIsbn());

			if($produto->isLivroFisico()) :
				$taxaImpressao = $this->conexao->real_escape_string($produto->getTaxaImpressao());

				$query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado,
																				tipo_produto, isbn, taxaImpressao)
									VALUES ('{$nome}', {$preco}, '{$descricao}', {$categoria}, {$usado},
													'{$tipo}', '{$isbn}', '{$taxaImpressao}')";
			else :
				$waterMark = $this->conexao->real_escape_string($produto->getWaterMark());
				$query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado,
																				tipo_produto, isbn)
									VALUES ('{$nome}', {$preco}, '{$descricao}', {$categoria}, {$usado},
													'{$tipo}', '{$isbn}', '{$waterMark}')";
			endif;
		else :
			$query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado, tipo_produto) VALUES
											('{$nome}', {$preco}, '{$descricao}', {$categoria}, {$usado}, '{$tipo}')";
		endif;

		return  $this->conexao->query($query);
	}

	function buscaProduto(Produto $produto) {
		$id = $this->conexao->real_escape_string($produto->getid());
		$query = "SELECT * FROM produtos WHERE id = {$id}";
		$resultado =  $this->conexao->query($query);
		$produto_array =  mysqli_fetch_assoc($resultado);
		$categoria = new Categoria($produto_array["categoria_id"], $nome);

		if(isset($produto_array["isbn"])) :
			$produto = new Livro($produto_array["nome"], $produto_array["preco"],
														 $produto_array["descricao"], $produto_array["usado"],
														 $categoria);
			$produto->setIsbn($produto_array["isbn"]);
		else :
			$produto = new Produto($produto_array["nome"], $produto_array["preco"],
														 $produto_array["descricao"], $produto_array["usado"],
														 $categoria);
		endif;

		$produto->setId($produto_array["id"]);
		return $produto;
	}

	function alteraProduto(Produto $produto) {
		$id = $this->conexao->real_escape_string($produto->getId());
		$nome = $this->conexao->real_escape_string($produto->getNome());
		$preco = $this->conexao->real_escape_string($produto->getPreco());
		$descricao = $this->conexao->real_escape_string($produto->getDescricao());
		$usado = $this->conexao->real_escape_string($produto->getUsado());
		$categoria = $this->conexao->real_escape_string($produto->getCategoria()->getId());
		$tipo = $this->conexao->real_escape_string($produto->getTipo());

		if($produto->isLivro()) :
			$isbn = $this->conexao->real_escape_string($produto->getIsbn());
			$query = "UPDATE produtos
								SET nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}',
								categoria_id = {$categoria}, usado = {$usado},
								tipo_produto = '{$tipo}', isbn = '{$isbn}'
								WHERE id = {$id}";
		else :
			$query = "UPDATE produtos
								SET nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}',
								categoria_id = {$categoria}, usado = {$usado},
								tipo_produto = '{$tipo}', isbn = NULL
								WHERE id = {$id}";
		endif;

		return $this->conexao->query($query);
	}

	function removeProduto(Produto $produto) {
		$id = mysqli_real_escape_string($this->conexao, $produto->getId());
		$query = "DELETE FROM produtos WHERE id = {$id}";
		return mysqli_query($this->conexao, $query);
	}
}
