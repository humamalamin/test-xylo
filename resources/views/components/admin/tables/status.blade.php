@if ($model == 1)
    <span class="label label-success label-pill label-inline mr-2">{{ __('New') }}</span>
@elseif($model == 2)
    <span class="label label-success label-pill label-inline mr-2">{{ __('In Progress') }}</span>
@else
    <span class="label label-success label-pill label-inline mr-2">{{ __('Done') }}</span>
@endif