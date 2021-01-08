<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user';
	 protected $primaryKey = 'id';

      protected $fillable = [
        'fname', 'lname','gender','status','email','phone','password', 
    ];
}


