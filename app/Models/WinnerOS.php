<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WinnerOS extends Model
{
    use HasFactory;

    protected $table = 'mst_event_winner_os';
    protected $primayKey = 'id_winner_os';
    protected $guarded = [];

}
