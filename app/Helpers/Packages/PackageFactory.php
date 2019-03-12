<?php

namespace App\Helpers\Packages;

class PackageFactory {
   public static function getPackageFilter($packageName) {
     $packageName = strtolower($packageName);
     switch($packageName) {
       case "free":
          return new Free();
          break;
       case "pro":
          return new Pro();
          break;
       case "gold":
          return new Gold();
          break;
       default:
          throw new \Exception("Unknown Package in Package factory");
     }
   }
}