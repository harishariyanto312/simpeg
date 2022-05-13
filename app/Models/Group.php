<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GroupPermission;

class Group extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function permissions()
    {
        $permissions = GroupPermission::where('group_id', $this->id)->pluck('permission_key')->all();
        return $permissions;
    }
}
