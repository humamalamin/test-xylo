@props(['title'])

<button type="button" {{ $attributes->merge(['class' => 'btn btn-sm btn-primary font-weight-bolder']) }}>
    <span class="fa fa-plus"></span>
    {{ __('Create') }} {{ $title }}
</button>