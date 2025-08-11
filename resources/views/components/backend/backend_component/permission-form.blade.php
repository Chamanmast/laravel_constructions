{{-- resources/views/components/backend/backend_component/permission-form.blade.php --}}

<x-form.form :route="$isEdit ? route('permission.update', $permission->id) : route('permission.store')" 
    method="{{ $isEdit ? 'put' : 'post' }}" 
    class="forms-sample needs-validation" 
    novalidate="novalidate">

{{-- Permission Name Input --}}
<div class="mb-3">
<x-form.input-label for="name" value="Permission Name" />
<x-form.text-input name="name" :value="$permission->name ?? null" placeholder="Permission Name" />
<x-form.input-error :messages="$errors->get('name')" class="pt-3" />
</div>

{{-- Permission Heading (Select Group) --}}
<div class="mb-3">
<x-form.input-label for="group_name" value="Permission Heading" />
<x-form.select name="group_name" :options="PERMISSIONS" :selected="$permission->group_name ?? null" placeholder="Select Group" />
<x-form.input-error :messages="$errors->get('group_name')" class="pt-3" />
</div>

{{-- Submit Button --}}
<x-form.button>Submit</x-form.button>

</x-form.form>
