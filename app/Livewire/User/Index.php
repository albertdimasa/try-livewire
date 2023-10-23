<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class Index extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            // Exportable::make('export')
            //     ->striped()
            //     ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return User::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name', fn ($data) => ucfirst($data->name))

           /** Example of custom column using a closure **/
            ->addColumn('role', function (User $model) {
                $data = $model->getRoleNames();
                $test = [];
                for ($i=0; $i < count($data); $i++) {
                    array_push($test, '<span class="badge bg-warning text-dark">'.$data[$i].'</span>');
                }

                return implode(" ", $test);
            })

            ->addColumn('email')
            ->addColumn('created_at_formatted', fn (User $model) => Carbon::parse($model->created_at)->format('d-m-Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('No', 'id'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),
            
            Column::make('Role', 'role'),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }

    // public function filters(): array
    // {
    //     return [
    //         Filter::inputText('name')->operators(['contains']),
    //         Filter::inputText('email')->operators(['contains']),
    //         Filter::datetimepicker('created_at'),
    //     ];
    // }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('swal:modal', [
            'type' => 'success',
            'message' => 'User Created Successfully!',
            'text' => 'It will list on users table soon.'
        ]);
    }

    public function actions(\App\Models\User $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit'.$row->id)
                ->class('btn btn-sm btn-primary')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

    
    // public function actionRules($row): array
    // {
    //     return [
    //          // Hide button edit for ID 1
    //          Rule::button('edit')
    //              ->when(fn ($row) => $row->id === auth()->user()->id)
    //              ->hide(),
    //      ];
    // }

}
