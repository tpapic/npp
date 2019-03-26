<?php
namespace App\Helpers\Filters;

class FilterFactory
{
  public static function factory($pictureName ,$chain, $path, $download = false)
  {
    if($download) {
      $imgName = $path . '/' . $pictureName;
      $pictureFile = pathinfo($pictureName);
      $newImgName = $pictureFile['filename'] . implode('|', $chain) . rand(1,100) . '.' . $pictureFile['extension'];

      copy($path . '/' . $pictureName, $path . '/' . $newImgName);

      $pictureName = $newImgName;
    }

    $instance = new Filter($pictureName, $path);
    
    foreach( array_reverse($chain) as $class )
    {
      $class = __NAMESPACE__ . '\\' . $class;
      if (class_exists($class) === false) {
          throw new \Exception('filter_not_found');
      }
      $instance = new $class( $instance );
    }
    return $instance->filter();
  }
}