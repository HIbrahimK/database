<?php

namespace App\Http\Livewire;

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
    public function resetName()
    {
        $this->name='Chico';
    }
    public function buyuk()
    {
        $this->name=strtoupper($this->name);
    }



}
