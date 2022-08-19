<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Winner;
use App\Models\RuleDepartment;
use App\Models\Departement;
use App\Models\WinnerOS;
use App\Models\UserOS;

class WinnerController extends Controller
{
    public function getWinner(Request $request) 
    {
        $winnerArray = [];
        $data = Winner::getWinner($request);

        while (count($data) == 0) {
            $data = Winner::getWinner($request);
            if (count($data) > 0) {
                break;
            }
        }

        foreach ($data as $item) {
            array_push($winnerArray,$item->user_nik);
        }

        $resultWinner = $this->randWinner($winnerArray);
        
        $winnerSplit = $this->splitWinner($resultWinner);
        $this->saveWinner($resultWinner,$request);
        return response()->json(["data"=>[
            "winner"=>$winnerSplit
        ]]);
    }

    public function getWinnerOS(Request $request)
    {
        $winnerArray = [];
        $data = UserOS::select('user_nik')
            ->whereNotIn('user_nik', WinnerOS::select('user_nik')->get()->toArray())
            ->get();
        foreach ($data as $item) {
            array_push($winnerArray,$item->user_nik);
        }

        $resultWinner = $this->randWinner($winnerArray);
        $winnerSplit = $this->splitWinner($resultWinner);
        $this->saveWinnerOS($resultWinner,$request);
        return response()->json(["data"=>[
            "winner"=>$winnerSplit
        ]]);
    }

    public function randWinner($winnerArray)
    {
        $number_count = count($winnerArray) - 1;
        $index = rand(0,$number_count);
        
        try {
            $resultWinner = $winnerArray[$index];
        } catch (\Throwable $e) {
            return 'error';
        }

        return $resultWinner;
    }

    public function splitWinner($resultWinner)
    {
        $winnerSplit = str_split($resultWinner);
        for ($i=0; $i < count($winnerSplit) ; $i++) { 
            if($winnerSplit[$i] == "0"){
                $winnerSplit[$i] = "10";
            }
        }
        return $winnerSplit;
    }

    public function detailWinner($nik)
    {
        $data = User::with(['Department'])->where('user_nik',$nik)->first();
        return response()->json([
            "message"=>"200",
            "data" => $data
        ]);
    }

    public function detailWinnerOS($nik)
    {
        $data = UserOS::where('user_nik',$nik)->first();
        return response()->json([
            "message"=>"200",
            "data" => $data
        ]);
    }

    public function saveWinner($nik,$request)
    {
        // if (User::select('department_id')->where('user_nik',$nik)->first()) {
            $dataUser = User::select('department_id')->where('user_nik',$nik)->first();
            if (!isset($dataUser->department_id)) {
                dd($dataUser,$nik);
            }
            $data = [
                "user_nik"=>$nik,
                "batch_id"=>$request->id_batch,
                "department_id"=>$dataUser->department_id,
                "created_by" => "system",
                "updated_by" => "system"
            ];

            $result = Winner::create($data);
            if ($result) {
            $this->addActualWinner($result);
            }
        // }
    }

    public function saveWinnerOS($nik,$request)
    {
        $data = [
            "user_nik"=>$nik,
            "created_by" => "system",
            "updated_by" => "system"
        ];
        WinnerOS::create($data);
    }

    public function addActualWinner($data)
    {
        $rule = RuleDepartment::where('department_id',$data->department_id)->first();
        RuleDepartment::where('department_id',$rule->department_id)
            ->update([
                "actual_winner" => $rule->actual_winner + 1,
                "updated_by" => "system"
            ]);
        return true;
    }

    public function ActualUpdate(Request $request)
    {
        $id_department = implode(",",$request->id_department);
        if ($request->type == "tambah") {
            Winner::PlusActual($id_department);
            return response()->json(["message" => "success"],200);
        }elseif ($request->type == "kurang") {
            Winner::MinActual($id_department);
            return response()->json(["message" => "success"],200);
        }
    }

    public function gerRefresherNik(Request $request)
    {
        $id_department = implode(",",$request->id_department);
        winner::InjectUpdate($id_department);
        Winner::MinActual($id_department);

        $winnerArray = [];
        $data = Winner::getWinner($request);
        foreach ($data as $item) {
            array_push($winnerArray,$item->user_nik);
        }
        
        $resultWinner = $this->randWinner($winnerArray);
        $winnerSplit = $this->splitWinner($resultWinner);
        $this->saveWinner($resultWinner,$request);
        return response()->json(["data"=>[
            "winner"=>$winnerSplit
        ]]);

    }

    public function getdepartwinner(Request $request)
    {
        $data = Departement::select('department_name')
            ->whereIN('department_id',$request->id_department)
            ->get();
        return response()->json([
            "message" => "success",
            "data" => $data
        ],200);
    }

    public function GetWInnerDepartment(Request $request)
    {
        $winnerArray = [];
        $user_nik = $this->changeZero($request->user_nik);
        $user_nik = implode(",",$user_nik);
        $user_nik = str_replace(',','',$user_nik);
        $user = User::select('department_id')
                    ->where('user_nik',$user_nik)
                    ->first();
        Winner::MinActual($user->department_id);
        $data = Winner::getWinner($user);
        foreach ($data as $item) {
            array_push($winnerArray,$item->user_nik);
        }

        $resultWinner = $this->randWinner($winnerArray);
        $winnerSplit = $this->splitWinner($resultWinner);
        $this->saveWinner($resultWinner,$request);
        return response()->json(["data"=>[
            "winner"=>$winnerSplit
        ]]);
    }

    public function changeZero($user_nik)
    {
        for ($i=0; $i < count($user_nik); $i++) { 
            if($user_nik[$i] == "10"){
                $user_nik[$i] = "0";
            }
        }
        return $user_nik;
    }
}
