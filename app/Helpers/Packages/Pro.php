<?php

namespace App\Helpers\Packages;

use App\Package;
use App\User;

class Pro extends PackageImp {
  public function packageFilter(Package $package, User $user, $fileSize) {
        $result = ['success' => false];

        if($user->curent_daily_upload === 0) {
            $result['reason'] = 'You reach max daily uplaod limit. Update package';
            return $result;
        }
        // $result['reason'] = json_encode($package->max_upload_size < $fileSize);
        // return $result;
    
        if($fileSize > $package->max_upload_size) {
            $result['reason'] = 'You are reach max allowed upload size('. $this->formatSizeUnits($package->max_upload_size) . '). Picture has: ' . $this->formatSizeUnits($fileSize);
            return $result;
        }

        $user->curent_daily_upload--;
        $user->save();

        return ['success' => true];
  }
}