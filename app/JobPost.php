<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    //Table name
    protected $table = 'jobPosts';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps = true;
}
