<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Notes')]

class Index extends Component
{
    #[On('NoteCreated')] // Ketika dispatch maka harus di Listen atau ON

    public function delete(Note $note)
    {
        $note->delete();
    }

    public function render()
    {
        return view('livewire.note.index', [
            'notes' => Note::query()->latest()->get(),
        ]);
    }
}
