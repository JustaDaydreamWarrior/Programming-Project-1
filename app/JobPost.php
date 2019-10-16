<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $fillable = [
        'id',
        'title',
        'description',
        'estSalary',
        'state',
        'city',
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

    //Table name
    protected $table = 'jobPosts';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
