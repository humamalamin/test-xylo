<?php

namespace App\Http\Livewire\Admin\Costumer;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{
    protected $listeners = [
        'refresh' => '$refresh',
        'confirmed',
        'cancelled',
    ];

    public $customer;

    public function columns(): array
    {
        return [
            Column::make(__('Name'), 'name')
                ->searchable()
                ->sortable(),
            Column::make(__('Agent Name'), 'agent.name')
                ->searchable()
                ->sortable(),
            Column::make(__('E-mail'), 'email')
                ->searchable()
                ->sortable(),
            Column::make(__('Phone'), 'phone')
                ->searchable()
                ->sortable(),
            Column::make(__('Status'), 'status')
                ->searchable()
                ->sortable(),
            Column::make(__('Actions'))
                ->format(function (Customer $model) {
                    return view('components.admin.tables.actions', [
                        'model' => $model,
                        'actions' => ['assign', 'update', 'delete'],
                        'permission' => 'contact',
                    ]);
                }),
        ];
    }

    public function query(): Builder
    {
        return Customer::with('agent');
    }

    public function showModal(Customer $customer)
    {
        $this->emitTo('admin.customer.show', 'show', $customer);
    }

    public function editModal(Customer $customer)
    {
        $this->emitTo('admin.customer.edit', 'update', $customer);
    }

    public function destroyConfirm(Customer $customer)
    {
        $this->customer = $customer;
        $this->confirm('Are you sure?');
    }

    public function confirmed()
    {
        $this->customer->delete();
        $this->alert('success', __('customer') . __(' deleted successfully!'));
    }

    public function cancelled()
    {
        $this->alert('info', __('Delete canceled!'));
        $this->reset('customer');
    }

}
