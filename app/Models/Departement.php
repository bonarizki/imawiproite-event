<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departement extends Model
{
    use SoftDeletes;

    protected $table = 'mst_main_department';
    protected $primaryKey = 'department_id';
    protected $fillable = [
                            "department_name",
                            "created_by",
                            "updated_by",
                            "deleted_at"
                        ];

    public function User()
    {
        return $this->hasMany('App\Models\User','department_id','department_id');
    }
}
