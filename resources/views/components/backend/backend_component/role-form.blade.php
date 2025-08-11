{{-- resources/views/components/backend/backend_component/role-form.blade.php --}}

<x-form.form :route="$isEdit ? route('roles.update', $roles->id) : route('roles.store')"
    method="{{ $isEdit ? 'patch' : 'post' }}"
    :isEdit="$isEdit"
    class="forms-sample needs-validation"
    novalidate="novalidate">

{{-- Role Name Input --}}
<div class="col-sm-12">
<x-form.input-label for="name" value="Role Name" />
<x-form.text-input name="name" :value="$roles->name ?? null" placeholder="Role Name" />
<x-form.input-error :messages="$errors->get('name')" class="pt-3" />
</div>

{{-- Submit Button --}}
<x-form.button>{{ $isEdit ? 'Update' : 'Submit' }}</x-form.button>

</x-form.form>
