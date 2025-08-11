{{-- resources/views/components/backend/backend_component/mega-menu-form.blade.php --}}

{{ Form::open([
    'route' => $isEdit ? ['megamenu.update', $megamenu->id] : 'megamenu.store',
    'class' => 'forms-sample needs-validation',
    'novalidate' => 'novalidate',
    'method' => $isEdit ? 'put' : 'post',
    'files' => true,
]) }}

<div class="mb-3">
    {!! Form::label('menu_id', 'Menu', ['class' => 'form-label']) !!}
    {!! Form::select('menu_id',  $menus, $megamenu->menu_id ?? null, [
        'class' => 'form-control',
      
        'required' => 'required',
        'placeholder' => 'Menu',
    ]) !!}
</div>

<div class="mb-3">
    {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}
    {!! Form::text('title', $megamenu->title ?? null, ['class' => 'form-control','required' => 'required', 'placeholder' => 'Title']) !!}
    @error('title')
        <span class="text-danger pt-3">{{ $message }}</span>
    @enderror
</div>

<div class="row">
    <div class="mb-3">
        {!! Form::label('links', 'More Menus', ['class' => 'form-label']) !!}
        {!! Form::select('links[]', $services, isset($megamenu) ? explode(',', $megamenu->links) : null, [
            'class' => 'form-control taggings',
            'multiple' => true,
        ]) !!}
    </div>
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-outline-primary btn-icon-text mb-2 mb-md-0']) !!}
{{ Form::close() }}