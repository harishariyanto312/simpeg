<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.employees_create')</x-slot>

    @if (session('status'))
        <x-alert>{{ session('status') }}</x-alert>
    @endif

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">

                <!-- Stepper -->
                <div class="bs-stepper border-0">
                    <div class="bs-stepper-header" role="tablist">
                        <div class="step" data-target="#sectionPersonalData" data-section="1">
                            <button class="step-trigger" type="button" role="tab" aria-controls="sectionPersonalData" id="sectionPersonalDataTrigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">@lang('system.employees_personal_data')</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#sectionEducations" data-section="2">
                            <button class="step-trigger" type="button" role="tab" aria-controls="sectionEducations" id="sectionEducationsTrigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">@lang('system.employees_educations')</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#sectionFamilies" data-section="3">
                            <button class="step-trigger" type="button" role="tab" aria-controls="sectionFamilies" id="sectionFamiliesTrigger">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">@lang('system.employees_families')</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#sectionEmploymentData" data-section="4">
                            <button class="step-trigger" type="button" role="tab" aria-controls="sectionEmploymentData" id="sectionEmploymentDataTrigger">
                                <span class="bs-stepper-circle">4</span>
                                <span class="bs-stepper-label">@lang('system.employees_employment_data')</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <div id="sectionPersonalData" class="content" role="tabpanel" aria-labelledby="sectionPersonalDataTrigger">
                            <!-- Personal Data -->
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
                            <!-- [END] Personal Data -->

                            <x-card>
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-primary" type="button" data-next="1">
                                            @lang('system.next')
                                            <span class="fas fa-fw fa-arrow-right"></span>
                                        </button>
                                    </div>
                                </div>
                            </x-card>
                        </div>

                        <div id="sectionEducations" class="content" role="tabpanel" aria-labelledby="sectionEducationsTrigger">
                            <div class="d-none" id="exampleEducationCard">
                                <x-card>
                                    <x-slot name="header">
                                        @lang('system.employees_educations') <span class="education-number"></span>
                                    </x-slot>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.select name="education_type_" :label="__('system.employee_education_type')" value="" :options="$education_types" />
                                        </div>
                                        <div class="col-12 col-lg-6"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.date name="education_date_aquired_" :label="__('system.employee_education_date_aquired')" value="" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="education_grade_" :label="__('system.employee_education_grade')" value="" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="education_school_name_" :label="__('system.employee_education_school_name')" value="" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="education_city_" :label="__('system.employee_education_city')" value="" />
                                        </div>
                                    </div>

                                    <x-forms.text name="education_certificate_number_" :label="__('system.employee_certificate_number')" value="" />
                                </x-card>
                            </div>

                            <x-card data-education="1">
                                <x-slot name="header">
                                    @lang('system.employees_educations') <span class="education-number">1</span>
                                </x-slot>

                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <x-forms.select name="education_type[1]" :label="__('system.employee_education_type')" value="" :options="$education_types" />
                                    </div>
                                    <div class="col-12 col-lg-6"></div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <x-forms.date name="education_date_aquired[1]" :label="__('system.employee_education_date_aquired')" value="" />
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <x-forms.text name="education_grade[1]" :label="__('system.employee_education_grade')" value="" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <x-forms.text name="education_school_name[1]" :label="__('system.employee_education_school_name')" value="" />
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <x-forms.text name="education_city[1]" :label="__('system.employee_education_city')" value="" />
                                    </div>
                                </div>

                                <x-forms.text name="education_certificate_number[1]" :label="__('system.employee_certificate_number')" value="" />
                            </x-card>

                            <div class="text-right mb-3">
                                <button class="btn btn-outline-primary" type="button" id="addEducation">
                                    <span class="fas fa-fw fa-add"></span>
                                </button>
                            </div>

                            <x-card>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary" type="button" data-prev="1">
                                            <span class="fas fa-fw fa-arrow-left"></span>
                                            @lang('system.prev')
                                        </button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-primary" type="button" data-next="1">
                                            @lang('system.next')
                                            <span class="fas fa-fw fa-arrow-right"></span>
                                        </button>
                                    </div>
                                </div>
                            </x-card>
                        </div>
                        
                        <div id="sectionFamilies" class="content" role="tabpanel" aria-labelledby="sectionFamilies">
                            <div class="d-none" id="exampleFamilyCard">
                                <x-card>
                                    <x-slot name="header">
                                        @lang('system.employees_families') <span class="family-number"></span>
                                    </x-slot>
                                </x-card>
                            </div>

                            <x-card data-family="1">
                                <x-slot name="header">
                                    @lang('system.employees_families') <span class="family-number">1</span>
                                </x-slot>
                            </x-card>

                            <div class="text-right mb-3">
                                <button class="btn btn-outline-primary" type="button" id="addFamily">
                                    <span class="fas fa-fw fa-add"></span>
                                </button>
                            </div>

                            <x-card>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary" type="button" data-prev="1">
                                            <span class="fas fa-fw fa-arrow-left"></span>
                                            @lang('system.prev')
                                        </button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-primary" type="button" data-next="1">
                                            @lang('system.next')
                                            <span class="fas fa-fw fa-arrow-right"></span>
                                        </button>
                                    </div>
                                </div>
                            </x-card>
                        </div>

                        <div id="sectionEmploymentData" class="content" role="tabpanel" aria-labelledby="sectionEmploymentDataTrigger">
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
                                <div>
                                    <label>@lang('system.employee_nssf_occupation')</label>
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="nssf_occupation" id="nssfOccupationY" value="Y" :label="__('system.y')" :is-checked="false" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="nssf_occupation" id="nssfOccupationN" value="N" :label="__('system.n')" :is-checked="false" />
                                        </div>
                                    </div>
                                </div>
                                <x-forms.text name="nssf_occupation_number" :label="__('system.employee_nssf_occupation_number')" :value="old('nssf_occupation_number')" />
                                <div class="row">
                                    <div class="col-6">
                                        <x-forms.text name="nssf_occupation_join_year" :label="__('system.nssf_occupation_join_year')" :value="old('nssf_occupation_join_year')" />
                                    </div>
                                    <div class="col-6">
                                        <x-forms.select name="nssf_occupation_join_month" :label="__('system.employee_nssf_occupation_join_month')" :value="old('nssf_occupation_join_month')" :options="$months" />
                                    </div>
                                </div>
                            </x-card>
            
                            <x-card :header="__('system.employees_nssf_health')">
                                <div>
                                    <label>@lang('system.employee_nssf_health')</label>
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="nssf_health" id="nssfHealthY" value="Y" :label="__('system.y')" :is-checked="false" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="nssf_health" id="nssfHealthN" value="N" :label="__('system.n')" :is-checked="false" />
                                        </div>
                                    </div>
                                </div>
                                <x-forms.text name="nssf_health_number" :label="__('system.employee_nssf_health_number')" :value="old('nssf_health_number')" />
                                <div class="row">
                                    <div class="col-6">
                                        <x-forms.text name="nssf_occupation_join_year" :label="__('system.nssf_occupation_join_year')" :value="old('nssf_occupation_join_year')" />
                                    </div>
                                    <div class="col-6">
                                        <x-forms.select name="nssf_occupation_join_month" :label="__('system.employee_nssf_occupation_join_month')" :value="old('nssf_occupation_join_month')" :options="$months" />
                                    </div>
                                </div>
                            </x-card>

                            <x-card>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary" type="button" data-prev="1">
                                            <span class="fas fa-fw fa-arrow-left"></span>
                                            @lang('system.prev')
                                        </button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-primary" type="submit">
                                            @lang('system.save')
                                        </button>
                                    </div>
                                </div>
                            </x-card>
                        </div>
                    </div>
                </div>
                <!-- [END] Stepper -->
            </div>
        </div>
    </form>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/plugins/datepicker/datepicker-bs4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/plugins/datepicker/datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datepicker/id.js') }}"></script>
        <script src="{{ asset('assets/plugins/datepicker/custom.js') }}"></script>
        <script src="{{ asset('assets/plugins/bs-stepper/js/index.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const stepper = new Stepper(document.querySelector('.bs-stepper'));

                const nextButtons = document.querySelectorAll('button[data-next="1"]');
                nextButtons.forEach(el => {
                    el.addEventListener('click', function () {
                        stepper.next();
                        window.scrollTo(0, 0);
                    });
                });

                const prevButtons = document.querySelectorAll('button[data-prev="1"]');
                prevButtons.forEach(el => {
                    el.addEventListener('click', function () {
                        stepper.previous();
                        window.scrollTo(0, 0);
                    });
                });

                const sectionButtons = document.querySelectorAll('div[data-section]');
                sectionButtons.forEach(el => {
                    el.addEventListener('click', function () {
                        let sectionNumber = el.dataset.section;
                        stepper.to(sectionNumber);
                        window.scrollTo(0, 0);
                    });
                });

                const addEducation = document.getElementById('addEducation');
                let currentEducationNumber = 1;
                addEducation.addEventListener('click', function () {
                    const elem = document.getElementById('exampleEducationCard').querySelector('div.card');
                    let clone = elem.cloneNode(true);
                    const anchorElement = document.querySelector('div.card[data-education="' + currentEducationNumber + '"]');

                    currentEducationNumber++;

                    clone.dataset.education = currentEducationNumber;
                    let educationNumbers = clone.querySelectorAll('.education-number');
                    educationNumbers.forEach(el => {
                        el.innerHTML = currentEducationNumber;
                    });

                    let fields1 = clone.querySelector('select[name="education_type_"]');
                    let labelField1 = clone.querySelector('label[for="select_education_type_"]');
                    fields1.name = "education_type[" + currentEducationNumber + "]";
                    labelField1.setAttribute('for', "selectEducationType" + currentEducationNumber);
                    fields1.id = "selectEducationType" + currentEducationNumber;                    

                    let field2 = clone.querySelector('input[name="education_date_aquired_"]');
                    let labelField2 = clone.querySelector('label[for="field_education_date_aquired_"]');
                    field2.name = "education_date_aquired[" + currentEducationNumber + "]";
                    labelField2.setAttribute('for', 'fieldEducationDateAquired' + currentEducationNumber);
                    field2.id = "fieldEducationDateAquired" + currentEducationNumber;

                    new Datepicker(field2, {
                        buttonClass: 'btn',
                        autohide: true,
                        format: 'dd/mm/yyyy',
                        startView: 2,
                        language: 'id',
                    });

                    let field3 = clone.querySelector('input[name="education_grade_"]');
                    let labelField3 = clone.querySelector('label[for="field_education_grade_"]');
                    field3.name = "education_grade[" + currentEducationNumber + "]";
                    labelField3.setAttribute('for', 'fieldEducationGrade' + currentEducationNumber);
                    field3.id = "fieldEducationGrade" + currentEducationNumber;

                    let field4 = clone.querySelector('input[name="education_school_name_"]');
                    let labelField4 = clone.querySelector('label[for="field_education_school_name_"]');
                    field4.name = "education_school_name[" + currentEducationNumber + "]";
                    labelField4.setAttribute('for', 'fieldEducationSchoolName' + currentEducationNumber);
                    field4.id = "fieldEducationSchoolName" + currentEducationNumber;

                    let field5 = clone.querySelector('input[name="education_city_"]');
                    let labelField5 = clone.querySelector('label[for="field_education_city_"]');
                    field5.name = "education_city[" + currentEducationNumber + "]";
                    labelField5.setAttribute('for', 'fieldEducationCity' + currentEducationNumber);
                    field5.id = "fieldEducationCity" + currentEducationNumber;

                    let field6 = clone.querySelector('input[name="education_certificate_number_"]');
                    let labelField6 = clone.querySelector('label[for="field_education_certificate_number_"]');
                    field6.name = "education_certificate_number[" + currentEducationNumber + "]";
                    labelField6.setAttribute('for', 'fieldEducationCertificateNumber' + currentEducationNumber);
                    field6.id = "fieldEducationCertificateNumber" + currentEducationNumber;                    

                    anchorElement.after(clone);
                });

                const addFamily = document.getElementById('addFamily');
                let currentFamilyNumber = 1;
                addFamily.addEventListener('click', function () {
                    const elem = document.getElementById('exampleFamilyCard').querySelector('div.card');
                    let clone = elem.cloneNode(true);
                    const anchorElement = document.querySelector('div.card[data-family="' + currentFamilyNumber + '"]');

                    currentFamilyNumber++;

                    clone.dataset.family = currentFamilyNumber;
                    let familyNumbers = clone.querySelectorAll('.family-number');
                    familyNumbers.forEach(el => {
                        el.innerHTML = currentFamilyNumber;
                    });

                    anchorElement.after(clone);
                });
            });
        </script>
    @endpush
</x-admin-layout>