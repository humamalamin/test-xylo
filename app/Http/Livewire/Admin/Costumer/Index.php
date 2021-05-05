<?php

namespace App\Http\Livewire\Admin\Costumer;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function mount()
    {
        abort_unless(Auth::user()->can('contact read'), 403);
    }
    public function render()
    {
        return view('livewire.admin.costumer.index')
            ->layout('layouts.admin');
    }
}
