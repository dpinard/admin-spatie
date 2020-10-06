<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'name', 'email', 'password', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopehasAdmin(Builder $query)
    {
        $query->whereHas('roles', function (Builder $query) {
            return $query->where('role_id', 2);
        });
    }

    public function scopehasUser(Builder $query) 
    {
        $query->whereHas('roles', function (Builder $query) {
            return $query->where('role_id', 1);
        });
    }

    public function scopeisOnline(Builder $query)
    {
        return $query->where('active', 1);
    }

    public function posts() 
    {
        return $this->hasMany('App\Post');
    }


}
