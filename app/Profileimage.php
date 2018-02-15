<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'user_profile_img';

    public $primaryKey = 'id' ;

    public $timestamps = true;

}
