<?php

class ProdutoFactory {

  private $classes = array("Produto", "Ebook", "LivroFisico");

  function criaPor($tipoProduto, $params) {
    $nome = $params["nome"];
    $preco = $params["preco"];
    $descricao = $descricao["descricao"];
    $categoria = new Categoria($categoriaNome);
    $usado = $params["usado"];

    if(in_array($tipoProduto, $this->classes)) {
      return new $tipoProduto($nome, $preco, $descricao, $categoria, $usado);
    }

    return new Produto($nome, $preco, $descricao, $categoria, $usado);
  }
}
?>
