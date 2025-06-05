<?php

namespace App\Http\Livewire;
use App\Models\Categorys;
use Livewire\Component;

class Sections extends Component
{
    public $data;

    public function check(){
        $validatedData = $this->validate([
            'data' => 'required',            
        ]);

    }
    public function render()
    {
        $this->data = Categorys::orderBy('created_at', 'desc')->get();
        return view('livewire.sections');
    }
}
