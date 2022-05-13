<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model
{
    use HasFactory;
    protected $table = 'group_permission';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
}
