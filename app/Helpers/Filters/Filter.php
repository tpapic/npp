<?php

namespace App\Helpers\Filters;

class Filter implements FilterImpl {
  public $filename;
  public $path;
  public $orginalPath;

  public function __construct($filename, $path) {
    $this->filename = $filename;
    $this->path = $path;
  }

  public function filter() {
    $this->orginalPath = $this->path . '/' . $this->filename;
  }

  public function getFullPath() {
    return $this->orginalPath;
  }

  public function getFilename() {
    return $this->filename;
  }
}