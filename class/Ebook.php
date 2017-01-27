<?php

class Ebook extends Livro {

  private $waterMark;

  function getWaterMark() {
    return $this->waterMark;
  }

  function setWaterMark($waterMark) {
    $this->waterMark= $waterMark;
  }

  function atualizaBaseadoEm($params) {
    $this->setIsbn($params["isbn"]);
    $this->setTaxaImpressao($params["taxaImpressao"]);
  }
}
