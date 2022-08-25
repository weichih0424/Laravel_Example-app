<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUsersModel extends Model
{
    use HasFactory;

    protected $fillable=['account', 'password', 'name'];
}
