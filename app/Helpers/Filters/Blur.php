<?php

namespace App\Helpers\Filters;

use Intervention\Image\ImageManagerStatic as Image;

class Blur implements FilterImpl {
  private $filter;

  public function __construct(FilterImpl $filter) {
    $this->filter = $filter;
  }

  public function filter() {
    $this->filter->filter();
    $img = Image::make($this->getFullPath());
    $img->blur(20)->save();

    return $this;
  }

  public function getFullPath() {
    return $this->filter->getFullPath();
  }

  public function getFilename() {
    return $this->filter->getFilename();
  }
}