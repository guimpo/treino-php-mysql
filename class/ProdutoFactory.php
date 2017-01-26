<?php

class ProdutoFactory {

  private $classes = array("Produto", "Ebook", "LivroFisico");

  function criaPor($tipoProduto, $params) {
    $nome = $params["nome"];
    $preco = $params["preco"];
    $descricao = $params["descricao"];
    $categoria_id = $params["categoria_id"];
    $categoria_nome = $params["categoria_nome"];
    $categoria = new Categoria($categoria_nome);
    $categoria->setId($categoria_id);
    $usado = $params["usado"];

    if(in_array($tipoProduto, $this->classes)) {
      return new $tipoProduto($nome, $preco, $descricao, $categoria, $usado);
    }

    return new Produto($nome, $preco, $descricao, $categoria, $usado);
  }
}
?>
