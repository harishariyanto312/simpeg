<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.titles_edit')</x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">
            @if (session('status'))
                <x-alert>{{ session('status') }}</x-alert>
            @endif

            <x-card>
                <form action="{{ route('titles.update', ['title' => $title]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-forms.text name="title" :label="__('system.title_title')" :value="old() ? old('title') : $title->title" />
                    <button class="btn btn-primary" type="submit">@lang('system.save')</button>
                </form>
            </x-card>
        </div>
    </div>
</x-admin-layout>