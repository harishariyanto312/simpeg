<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.locations_edit')</x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">

            @if (session('status'))
                <x-alert>{{ session('status') }}</x-alert>
            @endif

            <x-card>
                <form action="{{ route('locations.update', ['location' => $location]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-forms.text name="location" :label="__('system.location_location')" :value="old() ? old('location') : $location->location" />
                    <button class="btn btn-primary" type="submit">@lang('system.save')</button>
                </form>
            </x-card>

        </div>
    </div>
</x-admin-layout>