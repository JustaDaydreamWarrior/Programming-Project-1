<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'state',
        'city',
        'experience',
        'education',
        'java',
        'c',
        'c#',
        'c++',
        'php',
        'html',
        'css',
        'python',
        'javascript',
        'sql',
        'unix',
        'windows10',
        'windows7',
        'windowsOld',
        'windowsServer',
        'macOS',
        'linux',
        'bash',
        'ciscoSystems',
        'microsoftOffice',
        'ruby',
        'powershell',
        'rust',
        'iOS',
        'adobe',
        'cloud',
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

    public function jobposts(){
        return $this->hasMany('App\JobPost');
    }
}
