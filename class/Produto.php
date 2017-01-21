<<?php

class Produto {

  private $id;
  private $nome;
  private $preco;
  private $descricao;
  private $usado;
  private $categoria;

  function __construct($nome, $preco, $descricao, $usado, Categoria $categoria) {
    $this->nome = $nome;
    $this->preco = $preco;
    $this->descricao = $descricao;
    $this->usado = $usado;
    $this->categoria = $categoria;
  }

  function getId() {
    return $this->id;
  }
  function setId($id) {
    $this->id = $id;
  }
}
?>
