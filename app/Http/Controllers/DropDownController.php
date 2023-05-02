<?php

namespace App\Http\Controllers;

use App\Models\Okullar;

use App\Models\State;
use Illuminate\Http\Request;
use App\Models\Town;

class DropDownController extends Controller
{
public function index(){

    $iller = State::get(['sehiradi','id']);

   // dd($iller);
    return view('register',compact('iller'));
}
    public function fatchState(Request $request)
    {
        //$sehir_id =1;
        $data['states'] = Town::where('state_id',$request->state_id)->get(['ilceadi','id']);
        //dd('buraya geldim', response()->json($data));

        return response()->json($data);
    }

    public function fatchCity(Request $request)
    {

        $data['schools'] = Okullar::where('il_kodu', $request->state_id)->where('ilce_adi', $request->town_id)->get(['okul_adi', 'id']);

        return response()->json($data);
    }

}
