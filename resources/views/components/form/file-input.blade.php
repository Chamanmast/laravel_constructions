@props([
    'name',
    'placeholder' => '',
    'onchange' => '',
])

<div class="mb-3">
    <x-form.input-label :for="$name" :value="ucfirst(str_replace('_', ' ', $name))" />
    <input type="file" name="{{ $name }}" id="{{ $name }}" class="form-control" placeholder="{{ $placeholder }}" onchange="{{ $onchange }}">
    <x-form.input-error :messages="$errors->get($name)" class="mt-2" />
</div>
