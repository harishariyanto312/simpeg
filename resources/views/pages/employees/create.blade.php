<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.employees_create')</x-slot>

    @if (session('status'))
        <x-alert>{{ session('status') }}</x-alert>
    @endif

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-12 col-lg-6">
                <x-card :header="__('system.employees_personal_data')">
                    <x-forms.text name="employee_id" :label="__('system.employee_id')" :value="old('employee_id')" />
                    <x-forms.text name="first_name" :label="__('system.employee_first_name')" :value="old('first_name')" />
                    <x-forms.text name="middle_name" :label="__('system.employee_middle_name')" :value="old('middle_name')" />
                    <x-forms.text name="last_name" :label="__('system.employee_last_name')" :value="old('last_name')" />
                    <div>
                        <label>@lang('system.employee_sex')</label>
                        <x-forms.radio name="sex" id="sexMale" value="M" :label="__('system.employee_sex_male')" :is-checked="false" class="mb-0" />
                        <x-forms.radio name="sex" id="sexFemale" value="F" :label="__('system.employee_sex_female')" :is-checked="false" />
                    </div>
                    <x-forms.text name="birth_place" :label="__('system.employee_birth_place')" :value="old('birth_place')" />
                </x-card>
            </div>
        </div>
    </form>
</x-admin-layout>