<?php

class LivroFisco extends Livro {

  private $taxaImpressao;

  function getTaxaImpressao() {
    return $this->taxaImpressao;
  }

  function setTaxaImpressao($taxaImpressao) {
    $this->taxaImpressao = $taxaImpressao;
  }
}
