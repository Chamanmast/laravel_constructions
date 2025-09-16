{{-- resources/views/components/backend/backend_component/category-form.blade.php --}}

<x-form.form :route="route('branddetails.update', $brandDetail->id)" :isEdit="$isEdit">

    <div class="row">
        <div class="col-6">
            {{-- Location --}}
            <div class="mb-3">
                <x-form.input-label for="location" value="Location" />
                <x-form.text-input name="location" :value="$brandDetail->location ?? ''" placeholder="Location" />
                <x-form.input-error :messages="$errors->get('location')" class="mt-2" />
            </div>
        </div>
        <div class="col-6">

            {{-- Protocol --}}
            <div class="mb-3">
                <x-form.input-label for="protocol" value="Protocol" />
                <x-form.text-input name="protocol" :value="$brandDetail->protocol ?? ''" placeholder="Protocol" />
                <x-form.input-error :messages="$errors->get('protocol')" class="mt-2" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">

            {{-- Established Since --}}
            <div class="mb-3">
                <x-form.input-label for="eestablished_since" value="Established Since" />
                <x-form.text-input name="eestablished_since" :value="$brandDetail->eestablished_since ?? ''" placeholder="Established Since" />
                <x-form.input-error :messages="$errors->get('eestablished_since')" class="mt-2" />
            </div>

        </div>
        <div class="col-6">
            {{-- Worldwide --}}
            <div class="mb-3">
                <x-form.input-label for="worldwide" value="Worldwide" />
                <x-form.text-input name="worldwide" :value="$brandDetail->worldwide ?? ''" placeholder="Worldwide Presence" />
                <x-form.input-error :messages="$errors->get('worldwide')" class="mt-2" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            {{-- Controller --}}
            <div class="mb-3">
                <x-form.input-label for="controller" value="Controller" />
                <x-form.text-input name="controller" :value="$brandDetail->controller ?? ''" placeholder="Controller" />
                <x-form.input-error :messages="$errors->get('controller')" class="mt-2" />
            </div>
        </div>
        <div class="col-6">
            {{-- Status --}}
            <div class="mb-3">
                <x-form.input-label for="status" value="Status" />
                <x-form.select name="status" :options="['0' => 'Active', '1' => 'Inactive']" :selected="$brandDetail->status ?? '0'" />
                <x-form.input-error :messages="$errors->get('status')" class="mt-2" />
            </div>
        </div>
    </div>


    {{-- Submit Button --}}
    <x-form.button type="submit">
        {{ $isEdit ? 'Update' : 'Create' }}
    </x-form.button>

</x-form.form>
