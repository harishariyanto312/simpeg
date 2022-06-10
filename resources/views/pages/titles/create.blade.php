<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.titles_create')</x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">

            @if (session('status'))
                <x-alert>{{ session('status') }}</x-alert>
            @endif

            <x-card>
                <form action="{{ route('titles.store') }}" method="POST">
                    @csrf
                    <x-forms.text name="title" :label="__('system.title_title')" :value="old('title')" />
                    <button class="btn btn-primary" type="submit">@lang('system.save')</button>
                </form>
            </x-card>

        </div>
    </div>
</x-admin-layout>