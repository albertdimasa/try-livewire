<div>
    <div class="row">
        <div class="col">
            @livewire('note.create')
        </div>

        <div class="col">
            <h5 class="card-title">Notes</h5>
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">Text</th>
                        <th scope="col">At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($notes as $item)
                        <tr>
                            <td>{{ $item->text }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <button class="btn btn-sm btn-danger"
                                    wire:click='delete({{ $item->id }})'>Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
