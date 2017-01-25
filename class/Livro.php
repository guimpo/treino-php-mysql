<?php

abstrac class Livro extends Produto {

  private $isbn;

  function getIsbn() {
    return $this->isbn;
  }

  function setIsbn($isbn) {
    $this->isbn= $isbn;
  }

  function calculaImposto() {
    return $this->getPreco() * 0.065;
  }
}
