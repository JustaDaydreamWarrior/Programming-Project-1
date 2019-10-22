<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    //Technical skills a job seeker can possess
    protected $fillable = [
        'id',
        'title',
        'description',
        'estSalary',
        'state',
        'city',
        'java',
        'c',
        'csharp',
        'cplus',
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
        'android',
        'iOS',
        'adobe',
        'cloud',
    ];

    //Table name
    protected $table = 'jobposts';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\Employer');
    }
}
