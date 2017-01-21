<?php

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
    $this->setUsado($usado);
    $this->categoria = $categoria;
  }

  function getId() {
    return $this->id;
  }
  function setId($id) {
    $this->id = $id;
  }
  function getNome() {
    return $this->nome;
  }
  function setNome($nome) {
    $this->nome = $nome;
  }
  function getPreco() {
    return $this->preco;
  }
  function setPreco($preco) {
    $this->preco = $preco;
  }
  function getDescricao() {
    return $this->descricao;
  }
  function setDescricao($descricao) {
    $this->descricao = $descricao;
  }
  function getUsado() {
    return $this->usado;
  }
  function setUsado($usado) {
    if($usado == 1 || $usado == "true") {
        $this->usado = 1;
    } else {
      $this->usado = 0;
    }

  }
  function getCategoria() {
    return $this->categoria;
  }
}
?>
