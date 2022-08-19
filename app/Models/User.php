<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;
    
    protected $table = 'mst_main_participants';
    protected $primaryKey = 'user_id';
    protected $guarded = [] ;
    protected $hidden = [
        "password",
        "remember_token",
        "created_by",
        "created_at",
        "updated_by",
        "updated_at",
        "deleted_by",
        "deleted_at"
    ];

    public function Department(){
        return $this->belongsTo('App\Models\Departement','department_id','department_id');
    }

}
