<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolPermiso extends Model
{
    use HasFactory;

    protected $table="p2_roles_has_permissions";
    public $timestamps = false;
    protected $guarded=['permission_id','role_id'];
}
