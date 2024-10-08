<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;
use DB;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    protected $guard_name = 'web';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
      return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
      return [];
    }

    public static  function getpermissionGroups(){

$permission_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
return $permission_groups;

    }
   public static function  getPermissions($group_name){
$permissions = DB::table('permissions')
              ->select('id','name')
              ->where('group_name',$group_name)
              ->get();

    return $permissions;

    }

    public static function roleHasPermissions($role,$permissions){

      $hasPermission = true;
      foreach ($permissions as  $permission) {
   if (!$role->hasPermissionTo($permission->name)) {
    $hasPermission = false;
  }
  return $hasPermission;
      }

    }

}
