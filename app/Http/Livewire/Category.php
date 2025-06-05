<?php

namespace App\Http\Livewire;
use App\Models\Categorys;
use Livewire\Component;

class Category extends Component
{
    public $category;

    public function submit()
    {
        $validatedData = $this->validate([
            'category' => 'required',            
        ]);
   
        Categorys::create($validatedData);
        $this->reset('category');
        session()->flash('status', 'Category Added.');
        
    }
    public function render()
    { 
        
        return view('livewire.category');
    }
}
