<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    #[Rule(['required'])]
    public string $text='';

    public function save()
    {
        $validated = $this->validate();
        $note = Note::create($validated);

        session()->flash('message', 'Data saved successfully');

        $this->reset();

        // Ketika create data maka akan muncul tanpa refresh
        $this->dispatch('NoteCreated', $note->id);

    }

    public function render()
    {
        return view('livewire.note.create');
    }
}
