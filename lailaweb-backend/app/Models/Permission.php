<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = ['name','parent_id','display_name','key_code'];
    public function permissionsChil()
    {
        return $this->hasMany(Permission::class,'parent_id');
    }
}
