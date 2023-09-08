<?php

namespace App\Livewire\Note;

use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Title('Notes')]

    public function render()
    {
        return view('livewire.note.index');
    }
}
