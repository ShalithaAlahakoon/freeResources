<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class user extends Model
{
    use HasFactory;
    public $timestamps= false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'users';
}
