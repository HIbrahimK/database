<?php

namespace App\Http\Livewire;

use App\Models\Okullar;
use Livewire\Component;

class OkulSearch extends Component
{
    public $query;
    public $okullar;
    public function updateQuery(){


    }
    public function render()
    {



        return view('livewire.okul-search');
    }
}
