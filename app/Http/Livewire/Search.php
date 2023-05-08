<?php

namespace App\Http\Livewire;

use App\Models\UserCV;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public function render()
    {

        $searcheduser = UserCV::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('technology', 'like', '%'  . $this->search )
                ->get();

        return view('livewire.search',
            ['searcheduser' => $searcheduser,]
    );
    }

}
