<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{

     protected $guard = 'admin';

    protected $fillable = ['nom_admin','email','tel_admin','password','description_admin','photo_admin'];

    protected $hidden = ['password', 'remember_token'];
}
