<div style="overflow: visible; position: relative; width: 125px;">
    @if (in_array('assign', $actions) && Auth::user()->can($permission . ' read'))
    <button type="button" class="btn btn-sm btn-clean btn-icon" title="{{ __('View') }}" data-toggle="modal"
        data-target="#showModal" wire:click="showModal({{ $model->id }})">
        <span class="fa fa-eye"></span>
    </button>
    @endif
    @if (in_array('update', $actions) && Auth::user()->can($permission . ' update'))
    <button type="button" class="btn btn-sm btn-clean btn-icon" title="{{ __('Edit') }}" data-toggle="modal"
        data-target="#editModal" wire:click="editModal({{ $model->id }})">
        <span class="fa fa-book"></span>
    </button>
    @endif
    @if (in_array('delete', $actions) && Auth::user()->can($permission . ' delete'))
    <button type="button" class="btn btn-sm btn-clean btn-icon" title="{{ __('Delete') }}"
        wire:click="destroyConfirm({{ $model->id }})">
        <span class="fa fa-trash"></span>
    </button>
    @endif
</div>
