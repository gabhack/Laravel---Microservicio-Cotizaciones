<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'Cfg_Usuarios';
    protected $primaryKey = 'username';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
                'username',
                'cedula',
                'pwd',
                
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'pwd',
    ];

    public function getKeyName(){
       return "username";
    }

    protected function username()
    {
       
        return $this->usernametrait('username');
 
    }

    public function findbyname($q)
    {
        //return $this->where('cedula','like','%$q%')->get();
        $existe = User::where('username', '=', $q)->get();
        return $existe;
    }
    public function findbypwd($q)
    {
        //return $this->where('cedula','like','%$q%')->get();
        $existe = User::where('pwd', '=', $q)->get();
        return isset($existe);
    }

  
    public function getAuthPassword() {
        return $this->pwd;
    }
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
