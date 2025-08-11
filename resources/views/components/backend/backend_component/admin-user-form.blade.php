<x-form.form :route="$isEdit ? route('update.admin', $user->id) : route('store.admin')" :method="$isEdit ? 'PUT' : 'POST'"  :isEdit="$isEdit" enctype="multipart/form-data">

    {{-- Image Upload --}}
    <div class="row mb-3">
        <div class="col-sm-10">
            <x-form.input-label for="image" value="Image" />
            <x-form.file-input name="image" onchange="mainThamUrl(this)" />
            <x-form.input-error :messages="$errors->get('image')" />
            <img src="" id="mainThmb" class="img-thumbnail img-fluid my-3 w-10">
        </div>
        <div class="mt-3 col-sm-2">
            <img src="{{ asset($user->photo ? preg_replace('/\.(?=[^.]*$)/', '_thumb.', $user->photo) : 'upload/no_image.jpg') }}"
                class="img-thumbnail img-fluid w-10">
        </div>
    </div>

    {{-- User Info --}}
    <div class="row mb-3">
        <div class="col-sm-6">
            <x-form.input-label for="username" value="User Name" />
            <x-form.text-input name="username" :value="$user->username ?? ''" required placeholder="User Name" />
            <x-form.input-error :messages="$errors->get('username')" />
        </div>

        <div class="col-sm-6">
            <x-form.input-label for="name" value="Full Name" />
            <x-form.text-input name="name" :value="$user->name ?? ''" required placeholder="Full Name" />
            <x-form.input-error :messages="$errors->get('name')" />
        </div>
    </div>

    {{-- Contact Info --}}
    <div class="row mb-3">
        <div class="col-sm-6">
            <x-form.input-label for="email" value="Email" />
            <x-form.text-input name="email" :value="$user->email ?? ''" required placeholder="Email" />
            <x-form.input-error :messages="$errors->get('email')" />
        </div>

        <div class="col-sm-6">
            <x-form.input-label for="phone" value="Phone" />
            <x-form.text-input name="phone" :value="$user->phone ?? ''" placeholder="Phone" />
            <x-form.input-error :messages="$errors->get('phone')" />
        </div>
    </div>

    {{-- Address & Password --}}
    <div class="row mb-3">
        <div class="col-sm-6">
            <x-form.input-label for="address" value="Address" />
            <x-form.text-input name="address" :value="$user->address ?? ''" placeholder="Address" />
            <x-form.input-error :messages="$errors->get('address')" />
        </div>

        <div class="col-sm-6">
            <x-form.input-label for="password" value="Password" />
            <x-form.text-input type="password" name="password" placeholder="Password" />
            <x-form.input-error :messages="$errors->get('password')" />
        </div>
    </div>

    {{-- Roles --}}
    <div class="mb-3">
        <x-form.input-label for="roles" value="Role Name" />
        <x-form.select name="roles" :options="$roles" :selected="isset($user) ? ($user->role == 'admin' ? $user->roles[0]->id : 2) : null" placeholder="Select Roles" />
        <x-form.input-error :messages="$errors->get('roles')" />
    </div>

    {{-- Toggle Top --}}
    @if (isset($user) && $user->role == 'user')
        <div class="row py-3">
            <div class="col-sm-12">
                <div class="form-switch-custom switch-inline">
                    <x-form.text-input name="top" :checked="$user->top != 0" id="form-custom-switch-inner-text" label="Top" />
                </div>
            </div>
        </div>
    @endif

    {{-- Submit Button --}}
    <x-form.button type="submit">
        {{ $isEdit ? 'Update' : 'Submit' }}
    </x-form.button>

</x-form.form>
