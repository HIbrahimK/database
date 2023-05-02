<?php

namespace App\Http\Controllers;

use App\Models\Okullar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginname'=>'required',
            'loginpassword'=>'required',
            ]);
        //dd($incomingFields);
        if (auth()->attempt(['name'=>$incomingFields['loginname'],'password'=>$incomingFields['loginpassword']])){
            //dd("asa");
            $okulID =auth()->user()->okullar_id;

            $okulADI = Okullar::where('id', $okulID)->select('okul_adi')->first()->okul_adi;
            //dd($okulADI);
            $request->session()->regenerate();
            $request->session()->put('okulADI', $okulADI);
            //dd($okulADI);
            return redirect('/')->with("okul_adi",$okulADI);
        }
        else
        {
            return 'hatalı bilgi girdiniz';
        }

    }

    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name'=>['required','min:3','max:10',Rule::unique('users', 'name')],
            'state_id'=>'required',
            'mail'=>['required','email',Rule::unique('users', 'mail')],
           'town_id'=>'required',
            'okullar_id'=>'required',
            'password'=>['required','min:8']

        ]);
        $incomingFields['password']=bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        $okulID =auth()->user()->okullar_id;

        $okulADI = Okullar::where('id', $okulID)->select('okul_adi')->first()->okul_adi;
        //dd($okulADI);
        $request->session()->regenerate();
        $request->session()->put('okulADI', $okulADI);
        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
