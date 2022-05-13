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

                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <x-forms.text name="first_name" :label="__('system.employee_first_name')" :value="old('first_name')" />
                        </div>
                        <div class="col-12 col-lg-4">
                            <x-forms.text name="middle_name" :label="__('system.employee_middle_name')" :value="old('middle_name')" />
                        </div>
                        <div class="col-12 col-lg-4">
                            <x-forms.text name="last_name" :label="__('system.employee_last_name')" :value="old('last_name')" />
                        </div>
                    </div>

                    <div>
                        <label>@lang('system.employee_sex')</label>
                        <div>
                            <x-forms.radio name="sex" id="sexMale" value="M" :label="__('system.employee_sex_male')" :is-checked="false" class="d-inline-block" />
                            <x-forms.radio name="sex" id="sexFemale" value="F" :label="__('system.employee_sex_female')" :is-checked="false" class="ml-3 d-inline-block" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <x-forms.text name="birth_place" :label="__('system.employee_birth_place')" :value="old('birth_place')" />
                        </div>
                        <div class="col-12 col-lg-6">
                            <x-forms.date name="birth_date" :label="__('system.employee_birth_date')" :value="old('birth_date')" default-date="01/01/1995" />
                        </div>
                    </div>

                    <div class="row">
                        <label>@lang('system.employee_marital_status')</label>
                    </div>
                </x-card>
            </div>
        </div>
    </form>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/plugins/datepicker/datepicker-bs4.min.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/plugins/datepicker/datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datepicker/id.js') }}"></script>
        <script src="{{ asset('assets/plugins/datepicker/custom.js') }}"></script>
    @endpush
</x-admin-layout>