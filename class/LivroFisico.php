<?php

class Ebook extends Livro {

  private $waterMark;

  function getWaterMark() {
    return $this->waterMark;
  }

  function setWaterMark($waterMark) {
    $this->waterMark= $waterMark;
  }
}
