<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    public $isEdit = false;
    public Note $note;

    #[Rule(['required'])]
    public string $text='';

    #[On('NoteEdit')]
    public function editData(Note $note)
    {
        $this->text = $note->text;
        $this->note = $note;
        $this->isEdit = true;
    }
    
    public function save()
    {
        $validated = $this->validate();
        $validated['user_id'] = Auth::id();

        $note = Note::create($validated);
        
        session()->flash('message', 'Data Berhasil tersimpan');

        $this->reset();

        // Ketika create data maka akan muncul tanpa refresh
        $this->dispatch('NoteCreated', $note->id);

    }

    public function update(Note $note)
    {
        $validated = $this->validate();

        $note->update($validated);
        session()->flash('message', 'Data Berhasil terupdate');

        $this->reset();
        $this->isEdit = false;

        // Ketika create data maka akan muncul tanpa refresh
        $this->dispatch('NoteCreated', $note->id);
    }

    public function render()
    {
        return view('livewire.note.create');
    }
}
