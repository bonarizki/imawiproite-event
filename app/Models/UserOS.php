<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOS extends Model
{
    use HasFactory;

    protected $table = 'mst_participants_os';
    protected $primaryKey = 'id_participants_os';
    protected $guard = [];
}
