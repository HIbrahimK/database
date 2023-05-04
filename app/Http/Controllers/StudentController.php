<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create(Request $request){
        $student = new Student();
        $student->StudentID = $request->ogrenciNO;
        $student->StudentName=$request->ogrenciADI;
        $student->StudentSurName=$request->OgrenciSoyisim;
        $student->okullars_id=$request->OkulID;
        $student->save();

        return redirect('/students')->with('success', "kayıt başarılı");


    }

    public function listele(){
        $students = Student::query()->withTrashed()->get();
        //dd($gullan);
        return response()->json($students);
    }
}
