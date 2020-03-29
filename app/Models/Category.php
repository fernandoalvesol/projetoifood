<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use TenantTrait;

<<<<<<< HEAD
    protected $fillable = ['name', 'url', 'description'];
=======
    protected $fillable = ['name', 'url', 'description', 'flag_situacao'];
>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17
}
