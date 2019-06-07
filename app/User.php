<?php

namespace App;

use App\Models\OpticianDetail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar_id','role_id','is_active', 'type','optician_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'remember_token',
    ];

    public function avatar(){

        return $this->belongsTo('App\Avatar');
    }

    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public  function  optician(){

        return $this->belongsTo('App\Models\OpticianDetail');

    }

    public function  patients(){

        return $this->hasOne('App\Models\PatientDetail');
    }

    public function productType() {

        return $this->hasMany('App\Models\ProductType');
    }

    public function products(){

        return $this->hasMany('App\Models\Product');
    }

    public function vision(){

        return $this->hasMany('App\Models\Vision');
    }



    public static function CheckPermission($_value){
        if (is_array($_value))
        {

            $permission = \Auth::user()->hasAnyPermission($_value);
            if(!$permission){
                abort(403);
                return false;
            }else{
                return true;
            }
        }else{
            try {
                return \Auth::user()->hasPermissionTo($_value);
            } catch (\Exception $e){
                return false;
            }
        }
    }
}
