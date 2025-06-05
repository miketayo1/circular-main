<?php

namespace App\Http\Livewire;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categorys;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ShowResults extends Component
{

    use WithPagination;
    public $search  = '';
    public $category;
    public $sec;
    public $data = "";

    public function check()
    {
        $validatedData = $this->validate([
            'category' => 'required',
        ]);
    }

    public function cat()
    {
        $this->sec = $this->data;
        dd($this->sec);
    }

    public function render()
    {
        
        $this->category = Categorys::orderBy('created_at', 'desc')->get();

    

        return view('livewire.show-results', [
            'results' => Document::where('body', 'LIKE', "%{$this->search}%")
            ->orWhere('keyword', 'LIKE', "%{$this->search}%") 
            ->orWhere('category', 'LIKE', "%{$this->search}%") 
            ->orWhere('filename', 'LIKE', "%{$this->search}%")
            ->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}
