<?php

namespace App\Helpers\Filters;

interface FilterImpl {
  public function filter();
  public function getFullPath();
  public function getFilename();
}