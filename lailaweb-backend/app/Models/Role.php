<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    protected $fillable = ['name','display_name'];
    use HasFactory;
    use SoftDeletes;
    public function permissions()
    {
        return $this->BelongsToMany(Permission::class,'permission_role','role_id','permission_id');
    }
}
