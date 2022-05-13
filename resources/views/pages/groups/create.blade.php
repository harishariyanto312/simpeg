<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.groups_create')</x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">

            @if (session('status'))
                <x-alert>{{ session('status') }}</x-alert>
            @endif

            <x-card>

                <form action="{{ route('groups.store') }}" method="POST">
                    @csrf
                    <x-forms.text name="name" :label="__('system.group_name')" :value="old('name')" />
                    <div>
                        <button class="btn btn-primary" type="submit">@lang('system.save')</button>
                    </div>
                </form>

            </x-card>
        </div>
    </div>
</x-admin-layout>