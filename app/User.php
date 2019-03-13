<?php

namespace App;

use Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Notifications\ResetPasswordNotification;
use App\Helpers\SMS;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Stripe\Customer;
use App\Package;
use App\Helpers\Packages\PackageFactory;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    private $expirationDate = 15;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 
        'is_active', 'verified' , 'verified_token', 'role_id', 
        'social_provider_id', 'package_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attribute that will be added to model.
     *
     * @var array
     */
    protected $appends = [
        'full_name'
    ];

    /**
     * Automatically creates hash for the user password.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }


    public function getFullNameAttribute()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function socialProvider()
    {
        return $this->belongsTo(SocialProvider::class, 'social_provider_id');
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function uplaodPicturePackage($fileSize) {

        $package = PackageFactory::getPackageFilter($this->package->name);
        return $package->packageFilter($this->package, $this, $fileSize);

    }

    protected function generateVerifiedToken($length = 30)
    {
        $characters = '123456789abcdefghjkmnopqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
