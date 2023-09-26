<div>
    <p class="bg-warning text-black p-3 rounded">Apa aja sih yang sudah dilakukan akun ini? Check this out!!</p>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Task</th>
                    <th scope="col">Created at</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($history as $item)
                    <tr>
                        <td>{{ $item->task }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">Data Kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
