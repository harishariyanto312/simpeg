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
                        <div class="row">
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="sex" id="sexMale" value="M" :label="__('system.employee_sex_male')" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="sex" id="sexFemale" value="F" :label="__('system.employee_sex_female')" :is-checked="false" />
                            </div>
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

                    <div>
                        <label>@lang('system.employee_marital_status')</label>
                        <div class="row">
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="marital_status" id="maritalStatusSingle" value="SINGLE" :label="__('system.marital_status_single')" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="marital_status" id="maritalStatusMarried" value="MARRIED" :label="__('system.marital_status_married')" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="marital_status" id="maritalStatusWidower" value="WIDOWER" :label="__('system.marital_status_widower')" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="marital_status" id="maritalStatusWidow" value="WIDOW" :label="__('system.marital_status_widow')" :is-checked="false" />
                            </div>
                        </div>
                    </div>

                    <div>
                        <label>@lang('system.employee_religion')</label>
                        <div class="row">
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="religion" id="religionBuddhist" value="BUDDHIST" :label="__('system.religion_buddhist')" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="religion" id="religionHindu" value="HINDU" :label="__('system.religion_hindu')" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="religion" id="religionIslam" value="ISLAM" :label="__('system.religion_islam')" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="religion" id="religionCatholic" value="CATHOLIC" :label="__('system.religion_catholic')" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="religion" id="religionConfucianism" value="CONFUCIANISM" :label="__('system.religion_confucianism')" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="religion" id="religionChristian" value="CHRISTIAN" :label="__('system.religion_christian')" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="religion" id="religionNone" value="NONE" :label="__('system.religion_none')" :is-checked="false" />
                            </div>
                        </div>
                    </div>

                    <div>
                        <label>@lang('system.employee_type')</label>
                        <div class="row">
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="employee_type" id="employeeTypeLocal" value="LOCAL" :label="__('system.employee_type_local')" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="employee_type" id="employeeTypeExpatriate" value="EXPATRIATE" :label="__('system.employee_type_expatriate')" :is-checked="false" />
                            </div>
                        </div>
                    </div>

                    <div>
                        <label>@lang('system.employee_blood_type')</label>
                        <div class="row">
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="blood_type" id="bloodTypeOPlus" value="O+" label="O+" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="blood_type" id="bloodTypeOMinus" value="O-" label="O-" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="blood_type" id="bloodTypeAPlus" value="A+" label="A+" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="blood_type" id="bloodTypeAMinus" value="A-" label="A-" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="blood_type" id="bloodTypeABPlus" value="AB+" label="AB+" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="blood_type" id="bloodTypeABMinus" value="AB-" label="AB-" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="blood_type" id="bloodTypeBPlus" value="B+" label="B+" :is-checked="false" />
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-forms.radio name="blood_type" id="bloodTypeBMinus" value="B-" label="B-" :is-checked="false" />
                            </div>
                        </div>
                    </div>

                    <x-forms.text name="id_number" :label="__('system.employee_id_number')" :value="old('id_number')" />
                </x-card>

                <x-card :header="__('system.employees_address')">
                    <x-forms.textarea name="current_address" :label="__('system.employee_current_address')" :value="old('current_address')" />
                    <x-forms.text name="current_village" :label="__('system.employee_current_village')" :value="old('current_village')" />
                    <x-forms.text name="current_subdistrict" :label="__('system.employee_current_subdistrict')" :value="old('current_subdistrict')" />
                    <x-forms.text name="current_city" :label="__('system.employee_current_city')" :value="old('current_city')" />

                    <x-forms.textarea name="id_address" :label="__('system.employee_id_address')" :value="old('id_address')" />
                    <x-forms.text name="id_village" :label="__('system.employee_id_village')" :value="old('id_village')" />
                    <x-forms.text name="id_subdistrict" :label="__('system.employee_id_subdistrict')" :value="old('id_subdistrict')" />
                    <x-forms.text name="id_city" :label="__('system.employee_id_city')" :value="old('id_city')" />
                </x-card>

                <x-card :header="__('system.employees_contact')">
                    <x-forms.text name="home_phone" :label="__('system.employee_home_phone')" :value="old('home_phone')" />
                    <x-forms.text name="mobile_phone" :label="__('system.employee_mobile_phone')" :value="old('mobile_phone')" />
                    <x-forms.text name="email_address" :label="__('system.employee_email_address')" :value="old('email_address')" />
                </x-card>

                <x-card :header="__('system.employees_emergency_contact')">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <x-forms.text name="emergency_contact_name" :label="__('system.employee_emergency_contact_name')" :value="old('emergency_contact_name')" />
                        </div>
                        <div class="col-12 col-lg-6">
                            <x-forms.select name="emergency_contact_relationship" :label="__('system.employee_emergency_contact_relationship')" :value="old('emergency_contact_relationship')" :options="$emergency_contact_relationships" />
                        </div>
                    </div>
                    <x-forms.text name="emergency_contact_phone" :label="__('system.employee_emergency_contact_phone')" :value="old('emergency_contact_phone')" />
                </x-card>
            </div>
            <div class="col-12 col-lg-6">

                <x-card :header="__('system.employees_npwp')">
                    <x-forms.text name="npwp_id" :label="__('system.employee_npwp_id')" :value="old('npwp_id')" />
                    <x-forms.text name="npwp_city" :label="__('system.employee_npwp_city')" :value="old('npwp_city')" />
                    <x-forms.date name="npwp_date" :label="__('system.employee_npwp_date')" :value="old('npwp_date')" />
                </x-card>

                <x-card :header="__('system.employees_employment_data')">
                    <div>
                        <label>@lang('system.employee_present')</label>
                        <x-forms.radio name="always_present" id="alwaysPresentY" value="1" :label="__('system.always_present_y')" :is-checked="false" class="mb-0" />
                        <x-forms.radio name="always_present" id="alwaysPresentN" value="0" :label="__('system.always_present_n')" :is-checked="true" />
                    </div>
                    <x-forms.text name="tax_code" :label="__('system.employee_tax_code')" :value="old('tax_code')" />
                    <x-forms.date name="start_date" :label="__('system.employee_start_date')" :value="old('start_date')" />
                    <x-forms.date name="final_date" :label="__('system.employee_final_date')" :value="old('final_date')" />
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <x-forms.text name="basic_salary" :label="__('system.employee_basic_salary')" :value="old('basic_salary')" />
                        </div>
                        <div class="col-12 col-lg-4">
                            <x-forms.select name="salary_unit" :label="__('system.employee_salary_unit')" :value="old('salary_unit')" :options="$salary_units" />
                        </div>
                    </div>
                </x-card>

                <x-card :header="__('system.employees_bank')">
                    <x-forms.text name="bank_branch" :label="__('system.employee_bank_branch')" :value="old('bank_branch')" />
                    <x-forms.text name="bank_city" :label="__('system.employee_bank_city')" :value="old('bank_city')" />
                    <x-forms.text name="bank_cif" :label="__('system.employee_bank_cif')" :value="old('bank_cif')" />
                    <x-forms.text name="bank_account_number" :label="__('system.employee_bank_account_number')" :value="old('bank_account_number')" />
                    <x-forms.text name="bank_account_name" :label="__('system.employee_bank_account_name')" :value="old('bank_account_name')" />
                </x-card>

                <x-card :header="__('system.employees_nssf_occupation')">
                    <x-forms.text name="nssf_occupation_number" :label="__('system.employee_nssf_occupation_number')" :value="old('nssf_occupation_number')" />
                </x-card>

                <x-card :header="__('system.employees_nssf_health')">
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