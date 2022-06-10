<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.grades_edit')</x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">
            @if (session('status'))
                <x-alert>{{ session('status') }}</x-alert>
            @endif

            <x-card>
                <form action="{{ route('grades.update', ['grade' => $grade]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <x-forms.text name="grade" :label="__('system.grade_name')" :value="old() ? old('grade') : $grade->grade" />
                    <x-forms.text name="code" :label="__('system.grade_code')" :value="old() ? old('code') : $grade->code" />
                    <button class="btn btn-primary" type="submit">@lang('system.save')</button>
                </form>
            </x-card>
        </div>
    </div>
</x-admin-layout>