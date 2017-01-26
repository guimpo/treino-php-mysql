<?php

class ProdutoFactory {

  private $classes = array("Produto", "Ebook", "LivroFisico");

  function criaPor($tipoProduto, $params) {
    $nome = $params["nome"];
    $preco = $params["preco"];
    $descricao = $params["descricao"];
    $categoria_id = $params["categoria_id"];
    $categoria_nome = $params["categoria_nome"];
    $categoria = new Categoria($categoria_id, $categoria_nome);
    $usado = $params["usado"];

    if(in_array($tipoProduto, $this->classes)) {
      return new $tipoProduto($nome, $preco, $descricao, $usado, $categoria);
    }

    return new Produto($nome, $preco, $descricao, $usado, $categoria);
  }
}
?>
