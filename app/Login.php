<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Login extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
}