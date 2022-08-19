<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuleDepartment extends Model
{
    use HasFactory;

    protected $table = "mst_event_rule_department";
    protected $primaryKey = "rule_id";
    
}
