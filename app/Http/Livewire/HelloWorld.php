<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;

use Livewire\Component;

class HelloWorld extends Component
{

    public $name ="Halil";
    public $loud= false;
    public $greetings= ["hello"];
    public function render()
    {
        return view('livewire.hello-world');
    }

    public function mount(Request $request, $name){
        //İlk yüklemede çalışacak fonksiyon
        $this->name=$request->input('name', $name);
    }
    public function updatedName()
    {
        $this->name=mb_strtoupper($this->name,'UTF-8');
    }



}
