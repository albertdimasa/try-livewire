<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Notes')]

class Index extends Component
{
    #[On('NoteCreated')] // Ketika dispatch maka harus di Listen atau ON
    public function testData(Note $note)
    {
        $this->dispatch('notify');
    }

    public function delete(Note $note)
    {
        add_task("Delete note: dengan nilai: $note->text", $note->user_id);

        $note->delete();
    }
    
    public function edit(Note $note)
    {
        $this->dispatch('NoteEdit', $note->id);
    }

    public function render()
    {
        $notes = Note::where('user_id', Auth::id())->latest()->get();
        return view('livewire.note.index', ['notes' => $notes]);
    }
}
