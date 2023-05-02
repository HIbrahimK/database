<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kullanici;
use Illuminate\Support\Facades\Session;

class KullaniciController extends Controller
{
    public function create(Request $request){
       // dd("$request->isim","$request->yas");
        $kullan = new kullanici;
        $kullan->isim = $request->isim;
        $kullan->yas = $request->yas;
        $kullan->save();

        /*$gullan = kullanici::query()->get();
        session(['listeleme' =>$gullan]);*/
        return redirect('/ogrenciekle')->with('success', "kayıt başarılı");
    }
    public function listele(){
        $gullan = kullanici::query()->withTrashed()->get();
        //dd($gullan);
        return response()->json($gullan);
    }
    public function update(Request $request){
        // dd("$request->isim","$request->yas");
        $kullan = kullanici::find($request->eid);

           $kullan->isim = $request->isim;
        $kullan->yas = $request->yas;
        $kullan->save();

        /*$gullan = kullanici::query()->get();
        session(['listeleme' =>$gullan]);*/
        return redirect('/ogrenciekle')->with('success', "güncelleme başarılı");
    }

    public function delete(Request $request){

        $kullan = kullanici::find($request->id);

        $kullan->delete();

        return redirect('/ogrenciekle')->with('success', "silme başarılı");
    }
    public function fdelete(Request $request){

        //$kullan = kullanici::find($request->id)->withTrashed()->first();
        $kullan= kullanici::withTrashed()->find($request->id);
        $kullan->forceDelete();

        return redirect('/ogrenciekle')->with('success', "silme başarılı");
    }
}
