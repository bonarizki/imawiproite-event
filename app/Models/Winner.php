<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Winner extends Model
{
    use HasFactory;

    protected $table = 'mst_event_winner';
    protected $primayKey = 'winner_id';
    protected $guarded = [];

    public static function getWinner($request)
    {
        $condition = '';
        
        if ($request->id_department != null) {
            $id_department = implode(",",$request->id_department);
            $condition = "and mmp.department_id in (".$id_department.")";
        }
        $query = "select mmp.user_nik 
        from mst_main_participants mmp
            inner join mst_event_rule_department merd 
                on merd.department_id = mmp.department_id
        where merd.actual_winner < merd.rule_winner 
        ".$condition."
        and mmp.user_nik not in (select user_nik from mst_event_winner)
        and mmp.deleted_by is null
        and mmp.deleted_at is null";

        return DB::select($query);
    }

    public static function MinActual($id_department)
    {
        $query = "update mst_event_rule_department 
        set actual_winner = actual_winner - 1 
        where department_id in (".$id_department.")";
        return DB::update($query);
    }

    public static function PlusActual($id_department)
    {
        $query = "update mst_event_rule_department 
        set actual_winner = actual_winner + 1 
        where department_id in (".$id_department.")";
        return DB::update($query);
    }

    public static function InjectUpdate($id_department)
    {
        $query = "update mst_event_rule_department r
        set r.actual_winner = r.rule_winner
        where r.department_id in (".$id_department.")";

        return DB::update($query);
    }

}
