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
                        <div class="step" data-target="#sectionExps" data-section="4">
                            <button class="step-trigger" type="button" role="tab" aria-controls="sectionExps" id="sectionExpsTrigger">
                                <span class="bs-stepper-circle">4</span>
                                <span class="bs-stepper-label">@lang('system.employees_work_experiences')</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#sectionEmploymentData" data-section="5">
                            <button class="step-trigger" type="button" role="tab" aria-controls="sectionEmploymentData" id="sectionEmploymentDataTrigger">
                                <span class="bs-stepper-circle">5</span>
                                <span class="bs-stepper-label">@lang('system.employees_employment_data')</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <div id="sectionPersonalData" class="content" role="tabpanel" aria-labelledby="sectionPersonalDataTrigger">
                            <!-- Personal Data -->
                            <x-card :header="__('system.employees_personal_data')">
                                <x-forms.text name="employee_id" :label="__('system.employee_id')" :value="old('employee_id')" :is-required="true" />
            
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <x-forms.text name="first_name" :label="__('system.employee_first_name')" :value="old('first_name')" :is-required="true" />
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <x-forms.text name="middle_name" :label="__('system.employee_middle_name')" :value="old('middle_name')" />
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <x-forms.text name="last_name" :label="__('system.employee_last_name')" :value="old('last_name')" />
                                    </div>
                                </div>
            
                                <div>
                                    <label>@lang('system.employee_sex') <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="sex" id="sexMale" value="M" :label="__('system.employee_sex_male')" :is-checked="old('sex') == 'M' ? true : false" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="sex" id="sexFemale" value="F" :label="__('system.employee_sex_female')" :is-checked="old('sex') == 'F' ? true : false" />
                                        </div>
                                    </div>
                                    @error('sex')
                                        <div class="small text-danger mb-3">{{ $message }}</div>
                                    @enderror
                                </div>
            
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <x-forms.text name="birth_place" :label="__('system.employee_birth_place')" :value="old('birth_place')" :is-required="true" />
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <x-forms.date name="birth_date" :label="__('system.employee_birth_date')" :value="old('birth_date')" default-date="01/01/1995" :is-required="true" />
                                    </div>
                                </div>
            
                                <div>
                                    <label>@lang('system.employee_marital_status') <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="marital_status" id="maritalStatusSingle" value="SINGLE" :label="__('system.marital_status_single')" :is-checked="old('marital_status') == 'SINGLE' ? true : false" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="marital_status" id="maritalStatusMarried" value="MARRIED" :label="__('system.marital_status_married')" :is-checked="old('marital_status') == 'MARRIED' ? true : false" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="marital_status" id="maritalStatusWidower" value="WIDOWER" :label="__('system.marital_status_widower')" :is-checked="old('marital_status') == 'WIDOWER' ? true : false" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="marital_status" id="maritalStatusWidow" value="WIDOW" :label="__('system.marital_status_widow')" :is-checked="old('marital_status') == 'WIDOW' ? true : false" />
                                        </div>
                                    </div>
                                    @error('marital_status')
                                        <div class="small text-danger mb-3">{{ $message }}</div>
                                    @enderror
                                </div>
            
                                <div>
                                    <label>@lang('system.employee_religion') <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="religion" id="religionBuddhist" value="BUDDHIST" :label="__('system.religion_buddhist')" :is-checked="old('religion') == 'BUDDHIST' ? true : false" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="religion" id="religionHindu" value="HINDU" :label="__('system.religion_hindu')" :is-checked="old('religion') == 'HINDU' ? true : false" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="religion" id="religionIslam" value="ISLAM" :label="__('system.religion_islam')" :is-checked="old('religion') == 'ISLAM' ? true : false" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="religion" id="religionCatholic" value="CATHOLIC" :label="__('system.religion_catholic')" :is-checked="old('religion') == 'CATHOLIC' ? true : false" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="religion" id="religionConfucianism" value="CONFUCIANISM" :label="__('system.religion_confucianism')" :is-checked="old('religion') == 'CONFUCIANISM' ? true : false" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="religion" id="religionChristian" value="CHRISTIAN" :label="__('system.religion_christian')" :is-checked="old('religion') == 'CHRISTIAN' ? true : false" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="religion" id="religionNone" value="NONE" :label="__('system.religion_none')" :is-checked="old('religion') == 'NONE' ? true : false" />
                                        </div>
                                    </div>
                                    @error('religion')
                                        <div class="small text-danger mb-3">{{ $message }}</div>
                                    @enderror
                                </div>
            
                                <div>
                                    <label>@lang('system.employee_type') <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="employee_type" id="employeeTypeLocal" value="LOCAL" :label="__('system.employee_type_local')" :is-checked="old('employee_type') == 'LOCAL' ? true : false" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="employee_type" id="employeeTypeExpatriate" value="EXPATRIATE" :label="__('system.employee_type_expatriate')" :is-checked="old('employee_type') == 'EXPATRIATE' ? true : false" />
                                        </div>
                                    </div>
                                    @error('employee_type')
                                        <div class="small text-danger mb-3">{{ $message }}</div>
                                    @enderror
                                </div>

                                <x-forms.select name="blood_type" :label="__('system.employee_blood_type')" :value="old('blood_type')" :options="$blood_types" />
            
                                <x-forms.text name="id_number" :label="__('system.employee_id_number')" :value="old('id_number')" :is-required="true" />
                            </x-card>

                            <x-card :header="__('system.employees_address')">
                                <x-forms.textarea name="id_address" :label="__('system.employee_id_address')" :value="old('id_address')" :is-required="true" />
                                <x-forms.text name="id_village" :label="__('system.employee_id_village')" :value="old('id_village')" :is-required="true" />
                                <x-forms.text name="id_subdistrict" :label="__('system.employee_id_subdistrict')" :value="old('id_subdistrict')" :is-required="true" />
                                <x-forms.text name="id_city" :label="__('system.employee_id_city')" :value="old('id_city')" :is-required="true" />

                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="addressIsSame" value="1" name="address_is_same" {{ old('address_is_same') == '1' ? 'checked' : '' }}>
                                        <label for="addressIsSame" class="custom-control-label">@lang('system.address_is_same')</label>
                                    </div>
                                </div>

                                @if (old('address_is_same') == '1')
                                    <x-forms.textarea data-address="current" name="current_address" :label="__('system.employee_current_address')" :value="old('current_address')" :is-required="true" disabled />
                                    <x-forms.text data-address="current" name="current_village" :label="__('system.employee_current_village')" :value="old('current_village')" :is-required="true" disabled />
                                    <x-forms.text data-address="current" name="current_subdistrict" :label="__('system.employee_current_subdistrict')" :value="old('current_subdistrict')" :is-required="true" disabled />
                                    <x-forms.text data-address="current" name="current_city" :label="__('system.employee_current_city')" :value="old('current_city')" :is-required="true" disabled />
                                @else
                                    <x-forms.textarea data-address="current" name="current_address" :label="__('system.employee_current_address')" :value="old('current_address')" :is-required="true" />
                                    <x-forms.text data-address="current" name="current_village" :label="__('system.employee_current_village')" :value="old('current_village')" :is-required="true" />
                                    <x-forms.text data-address="current" name="current_subdistrict" :label="__('system.employee_current_subdistrict')" :value="old('current_subdistrict')" :is-required="true" />
                                    <x-forms.text data-address="current" name="current_city" :label="__('system.employee_current_city')" :value="old('current_city')" :is-required="true" />
                                @endif
                            </x-card>
            
                            <x-card :header="__('system.employees_contact')">
                                <x-forms.text name="home_phone" :label="__('system.employee_home_phone')" :value="old('home_phone')" />
                                <x-forms.text name="mobile_phone" :label="__('system.employee_mobile_phone')" :value="old('mobile_phone')" :is-required="true" />
                                <x-forms.text name="email_address" :label="__('system.employee_email_address')" :value="old('email_address')" :is-required="true" />
                            </x-card>

                            <x-card :header="__('system.employees_emergency_contact')">
                                <div class="d-none" id="exampleEmergencyContact">
                                    <div class="row">
                                        <div class="col-12 col-lg-4">
                                            <x-forms.array.text name="emergency_contact_name_" :label="__('system.employee_emergency_contact_name')" value="" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <x-forms.select name="emergency_contact_relationship_" :label="__('system.employee_emergency_contact_relationship')" value="" :options="$emergency_contact_relationships" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <x-forms.text name="emergency_contact_phone_" :label="__('system.employee_emergency_contact_phone')" value="" :is-required="true" />
                                        </div>
                                    </div>
                                </div>

                                @if (old())
                                    @for ($i = 1; $i <= count(old('emergency_contact_name')); $i++)
                                        <div class="row" data-emergency-contact="{{ $i }}">
                                            <div class="col-12 col-lg-4">
                                                <x-forms.array.text name="emergency_contact_name[{{ $i }}]" :label="__('system.employee_emergency_contact_name')" :value="old('emergency_contact_name.' . $i)" :is-required="true" />
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <x-forms.array.select name="emergency_contact_relationship[{{ $i }}]" :label="__('system.employee_emergency_contact_relationship')" :value="old('emergency_contact_relationship.' . $i)" :options="$emergency_contact_relationships" :is-required="true" />
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <x-forms.array.text name="emergency_contact_phone[{{ $i }}]" :label="__('system.employee_emergency_contact_phone')" :value="old('emergency_contact_phone.' . $i)" :is-required="true" />
                                            </div>
                                        </div>
                                    @endfor
                                @else
                                    <div class="row" data-emergency-contact="1">
                                        <div class="col-12 col-lg-4">
                                            <x-forms.text name="emergency_contact_name[1]" :label="__('system.employee_emergency_contact_name')" value="" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <x-forms.select name="emergency_contact_relationship[1]" :label="__('system.employee_emergency_contact_relationship')" value="" :options="$emergency_contact_relationships" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <x-forms.text name="emergency_contact_phone[1]" :label="__('system.employee_emergency_contact_phone')" value="" :is-required="true" />
                                        </div>
                                    </div>
                                @endif

                                <div class="text-right mb-3">
                                    <button class="btn btn-outline-primary" type="button" id="addEmergencyContact">
                                        <span class="fas fa-fw fa-add"></span>
                                    </button>
                                </div>
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
                                            <x-forms.select name="education_type_" :label="__('system.employee_education_type')" value="" :options="$education_types" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-6"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.date name="education_date_aquired_" :label="__('system.employee_education_date_aquired')" value="" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="education_grade_" :label="__('system.employee_education_grade')" value="" :is-required="true" />
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

                            @if (old())
                                @for ($i = 1; $i <= count(old('education_type')); $i++)
                                    <x-card data-education="{{ $i }}">
                                        <x-slot name="header">
                                            @lang('system.employees_educations') <span class="education-number">{{ $i }}</span>
                                        </x-slot>

                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.select name="education_type[{{ $i }}]" :label="__('system.employee_education_type')" :value="old('education_type.' . $i)" :options="$education_types" />
                                            </div>
                                            <div class="col-12 col-lg-6"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.date name="education_date_aquired[{{ $i }}]" :label="__('system.employee_education_date_aquired')" :value="old('education_date_aquired.' . $i)" />
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.text name="education_grade[{{ $i }}]" :label="__('system.employee_education_grade')" :value="old('education_grade.' . $i)" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.text name="education_school_name[{{ $i }}]" :label="__('system.employee_education_school_name')" :value="old('education_school_name.' . $i)" />
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.text name="education_city[{{ $i }}]" :label="__('system.employee_education_city')" :value="old('education_city.' . $i)" />
                                            </div>
                                        </div>

                                        <x-forms.array.text name="education_certificate_number[{{ $i }}]" :label="__('system.employee_certificate_number')" :value="old('education_certificate_number.' . $i)" />
                                    </x-card>                                    
                                @endfor
                            @else
                                <x-card data-education="1">
                                    <x-slot name="header">
                                        @lang('system.employees_educations') <span class="education-number">1</span>
                                    </x-slot>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.select name="education_type[1]" :label="__('system.employee_education_type')" value="" :options="$education_types" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-6"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.date name="education_date_aquired[1]" :label="__('system.employee_education_date_aquired')" value="" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="education_grade[1]" :label="__('system.employee_education_grade')" value="" :is-required="true" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="education_school_name[1]" :label="__('system.employee_education_school_name')" value="" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="education_city[1]" :label="__('system.employee_education_city')" value="" :is-required="true" />
                                        </div>
                                    </div>

                                    <x-forms.text name="education_certificate_number[1]" :label="__('system.employee_certificate_number')" value="" />
                                </x-card>
                            @endif

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

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="family_name_" :label="__('system.employee_family_name')" value="" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.select name="family_relationship_" :label="__('system.employee_family_relationship')" value="" :options="$family_relationships" :is-required="true" />
                                        </div>
                                    </div>

                                    <div>
                                        <label>@lang('system.family_sex') <span class="text-danger">*</span> </label>
                                        <input type="hidden" name="family_sex_" value="">
                                        <div class="row">
                                            <div class="col-6 col-lg-3">
                                                <x-forms.radio name="family_sex_" id="family_sex_M" value="M" :label="__('system.family_sex_male')" :is-checked="false" />
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <x-forms.radio name="family_sex_" id="family_sex_F" value="F" :label="__('system.family_sex_female')" :is-checked="false" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.date name="family_birth_date_" :label="__('system.employee_family_birth_date')" value="" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.select name="family_status_" :label="__('system.employee_family_status')" value="" :options="$family_status" />
                                        </div>
                                    </div>

                                    <div>
                                        <label>@lang('system.employee_family_same_company') <span class="text-danger">*</span></label>
                                        <input type="hidden" name="family_same_company_" value="">
                                        <div class="row">
                                            <div class="col-6 col-lg-3">
                                                <x-forms.radio name="family_same_company_" id="family_same_company_Y" value="Y" :label="__('system.y')" :is-checked="false" />
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <x-forms.radio name="family_same_company_" id="family_same_company_N" value="N" :label="__('system.n')" :is-checked="false" />
                                            </div>
                                        </div>
                                    </div>
                                </x-card>
                            </div>

                            @if (old())
                                @for ($i = 1; $i <= count(old('family_name')); $i++)
                                    <x-card data-family="{{ $i }}">
                                        <x-slot name="header">
                                            @lang('system.employees_families') <span class="family-number">{{ $i }}</span>
                                        </x-slot>

                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.text name="family_name[{{ $i }}]" :label="__('system.employee_family_name')" :value="old('family_name.' . $i)" :is-required="true" />
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.select name="family_relationship[{{ $i }}]" :label="__('system.employee_family_relationship')" :value="old('family_relationship.' . $i)" :options="$family_relationships" :is-required="true" />
                                            </div>
                                        </div>

                                        <div>
                                            <label>@lang('system.family_sex') <span class="text-danger">*</span></label>
                                            <input type="hidden" name="family_sex[{{ $i }}]" value="">
                                            <div class="row">
                                                <div class="col-6 col-lg-3">
                                                    <x-forms.radio name="family_sex[{{ $i }}]" id="familySexM{{ $i }}" value="M" :label="__('system.family_sex_male')" :is-checked="old('family_sex.' . $i) == 'M' ? true : false" />
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <x-forms.radio name="family_sex[{{ $i }}]" id="familySexF{{ $i }}" value="F" :label="__('system.family_sex_female')" :is-checked="old('family_sex.' . $i) == 'F' ? true : false" />
                                                </div>
                                            </div>
                                            @error('family_sex.' . $i)
                                                <div class="small text-danger mb-3">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.date name="family_birth_date[{{ $i }}]" :label="__('system.employee_family_birth_date')" :value="old('family_birth_date.' . $i)" :is-required="true" />
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.select name="family_status[{{ $i }}]" :label="__('system.employee_family_status')" :value="old('family_status.' . $i)" :options="$family_status" />
                                            </div>
                                        </div>

                                        <div>
                                            <label>@lang('system.employee_family_same_company') <span class="text-danger">*</span></label>
                                            <input type="hidden" name="family_same_company[{{ $i }}]" value="">
                                            <div class="row">
                                                <div class="col-6 col-lg-3">
                                                    <x-forms.radio name="family_same_company[{{ $i }}]" id="family_same_company_Y{{ $i }}" value="Y" :label="__('system.y')" :is-checked="old('family_same_company.' . $i) == 'Y' ? true : false" />
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <x-forms.radio name="family_same_company[{{ $i }}]" id="family_same_company_N{{ $i }}" value="N" :label="__('system.n')" :is-checked="old('family_same_company.' . $i) == 'N' ? true : false" />
                                                </div>
                                            </div>
                                            @error('family_same_company.' . $i)
                                                <div class="small text-danger mb-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </x-card>
                                @endfor
                            @else
                                <x-card data-family="1">
                                    <x-slot name="header">
                                        @lang('system.employees_families') <span class="family-number">1</span>
                                    </x-slot>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="family_name[1]" :label="__('system.employee_family_name')" value="" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.select name="family_relationship[1]" :label="__('system.employee_family_relationship')" value="" :options="$family_relationships" :is-required="true" />
                                        </div>
                                    </div>

                                    <div>
                                        <label>@lang('system.family_sex') <span class="text-danger">*</span></label>
                                        <input type="hidden" name="family_sex[1]" value="">
                                        <div class="row">
                                            <div class="col-6 col-lg-3">
                                                <x-forms.radio name="family_sex[1]" id="familySexM1" value="M" :label="__('system.family_sex_male')" :is-checked="false" />
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <x-forms.radio name="family_sex[1]" id="familySexF1" value="F" :label="__('system.family_sex_female')" :is-checked="false" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.date name="family_birth_date[1]" :label="__('system.employee_family_birth_date')" value="" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.select name="family_status[1]" :label="__('system.employee_family_status')" value="" :options="$family_status" />
                                        </div>
                                    </div>

                                    <div>
                                        <label>@lang('system.employee_family_same_company') <span class="text-danger">*</span></label>
                                        <input type="hidden" name="family_same_company[1]" value="">
                                        <div class="row">
                                            <div class="col-6 col-lg-3">
                                                <x-forms.radio name="family_same_company[1]" id="family_same_company_Y1" value="Y" :label="__('system.y')" :is-checked="false" />
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <x-forms.radio name="family_same_company[1]" id="family_same_company_N1" value="N" :label="__('system.n')" :is-checked="false" />
                                            </div>
                                        </div>
                                    </div>
                                </x-card>
                            @endif

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

                        <div class="content" id="sectionExps" role="tabpanel" aria-labelledby="sectionExpsTrigger">
                            <div class="d-none" id="exampleExpCard">
                                <x-card>
                                    <x-slot name="header">
                                        @lang('system.employees_work_experiences') <span class="exp-number"></span>
                                    </x-slot>

                                    <x-forms.text name="exp_company_name_" :label="__('system.employee_exp_company_name')" value="" :is-required="true" />

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.date name="exp_start_date_" :label="__('system.employee_exp_start_date')" value="" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.date name="exp_end_date_" :label="__('system.employee_exp_end_date')" value="" :is-required="true" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="exp_end_job_title_" :label="__('system.employee_exp_end_job_title')" value="" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="exp_end_pay_rate_" :label="__('system.employee_exp_end_pay_rate')" value="" :is-required="true" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.textarea name="exp_job_desc_" :label="__('system.employee_exp_job_desc')" value="" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.textarea name="exp_job_remarks_" :label="__('system.employee_exp_job_remarks')" value="" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="exp_company_city_" :label="__('system.employee_exp_company_city')" value="" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="exp_company_phone_" :label="__('system.employee_exp_company_phone')" value="" />
                                        </div>
                                    </div>
                                </x-card>
                            </div>

                            @if (old())
                                @for ($i = 1; $i <= count(old('exp_company_name')); $i++)
                                    <x-card data-exp="{{ $i }}">
                                        <x-slot name="header">
                                            @lang('system.employees_work_experiences') <span class="exp-number">{{ $i }}</span>
                                        </x-slot>

                                        <x-forms.array.text name="exp_company_name[{{ $i }}]" :label="__('system.employee_exp_company_name')" :value="old('exp_company_name.' . $i)" :is-required="true" />

                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.date name="exp_start_date[{{ $i }}]" :label="__('system.employee_exp_start_date')" :value="old('exp_start_date.' . $i)" :is-required="true" />
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.date name="exp_end_date[{{ $i }}]" :label="__('system.employee_exp_end_date')" :value="old('exp_end_date.' . $i)" :is-required="true" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.text name="exp_end_job_title[{{ $i }}]" :label="__('system.employee_exp_end_job_title')" :value="old('exp_end_job_title.' . $i)" :is-required="true" />
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.text name="exp_end_pay_rate[{{ $i }}]" :label="__('system.employee_exp_end_pay_rate')" :value="old('exp_end_pay_rate.' . $i)" :is-required="true" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.textarea name="exp_job_desc[{{ $i }}]" :label="__('system.employee_exp_job_desc')" :value="old('exp_job_desc.' . $i)" />
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.textarea name="exp_job_remarks[{{ $i }}]" :label="__('system.employee_exp_job_remarks')" :value="old('exp_job_remarks.' . $i)" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.text name="exp_company_city[{{ $i }}]" :label="__('system.employee_exp_company_city')" :value="old('exp_company_city.' . $i)" :is-required="true" />
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <x-forms.array.text name="exp_company_phone[{{ $i }}]" :label="__('system.employee_exp_company_phone')" :value="old('exp_company_phone.' . $i)" />
                                            </div>
                                        </div>
                                    </x-card>                                    
                                @endfor
                            @else
                                <x-card data-exp="1">
                                    <x-slot name="header">
                                        @lang('system.employees_work_experiences') <span class="exp-number">1</span>
                                    </x-slot>

                                    <x-forms.text name="exp_company_name[1]" :label="__('system.employee_exp_company_name')" value="" :is-required="true" />

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.date name="exp_start_date[1]" :label="__('system.employee_exp_start_date')" value="" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.date name="exp_end_date[1]" :label="__('system.employee_exp_end_date')" value="" :is-required="true" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="exp_end_job_title[1]" :label="__('system.employee_exp_end_job_title')" value="" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="exp_end_pay_rate[1]" :label="__('system.employee_exp_end_pay_rate')" value="" :is-required="true" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.textarea name="exp_job_desc[1]" :label="__('system.employee_exp_job_desc')" value="" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.textarea name="exp_job_remarks[1]" :label="__('system.employee_exp_job_remarks')" value="" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="exp_company_city[1]" :label="__('system.employee_exp_company_city')" value="" :is-required="true" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <x-forms.text name="exp_company_phone[1]" :label="__('system.employee_exp_company_phone')" value="" />
                                        </div>
                                    </div>
                                </x-card>
                            @endif

                            <div class="text-right mb-3">
                                <button class="btn btn-outline-primary" type="button" id="addExp">
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
                                    <label>@lang('system.employee_present') <span class="text-danger">*</span></label>
                                    <x-forms.radio name="always_present" id="alwaysPresentY" value="Y" :label="__('system.always_present_y')" :is-checked="old('always_present') == 'Y' ? true : false" class="mb-0" />
                                    <x-forms.radio name="always_present" id="alwaysPresentN" value="N" :label="__('system.always_present_n')" :is-checked="old() ? (old('always_present') == 'N' ? true : false) : true" />
                                </div>
                                <x-forms.text name="tax_code" :label="__('system.employee_tax_code')" :value="old('tax_code')" />
                                <x-forms.date name="start_date" :label="__('system.employee_start_date')" :value="old('start_date')" :is-required="true" />
                                <x-forms.date name="final_date" :label="__('system.employee_final_date')" :value="old('final_date')" />
                                <div class="row">
                                    <div class="col-12 col-lg-8">
                                        <x-forms.text name="basic_salary" :label="__('system.employee_basic_salary')" :value="old('basic_salary')" :is-required="true" />
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <x-forms.select name="salary_unit" :label="__('system.employee_salary_unit')" :value="old('salary_unit')" :options="$salary_units" :is-required="true" />
                                    </div>
                                </div>
                            </x-card>
            
                            <x-card :header="__('system.employees_bank')">
                                <x-forms.text name="bank_branch" :label="__('system.employee_bank_branch')" :value="old('bank_branch')" :is-required="true" />
                                <x-forms.text name="bank_city" :label="__('system.employee_bank_city')" :value="old('bank_city')" :is-required="true" />
                                <x-forms.text name="bank_cif" :label="__('system.employee_bank_cif')" :value="old('bank_cif')" />
                                <x-forms.text name="bank_account_number" :label="__('system.employee_bank_account_number')" :value="old('bank_account_number')" :is-required="true" />
                                <x-forms.text name="bank_account_name" :label="__('system.employee_bank_account_name')" :value="old('bank_account_name')" :is-required="true" />
                            </x-card>
            
                            <x-card :header="__('system.employees_nssf_occupation')">
                                <div>
                                    <label>@lang('system.employee_nssf_occupation') <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="nssf_occupation" id="nssfOccupationY" value="Y" :label="__('system.y')" :is-checked="old('nssf_occupation') == 'Y' ? true : false" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="nssf_occupation" id="nssfOccupationN" value="N" :label="__('system.n')" :is-checked="old('nssf_occupation') == 'N' ? true : false" />
                                        </div>
                                    </div>
                                    @error('nssf_occupation')
                                        <div class="small text-danger mb-3">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if (old('nssf_occupation') == 'N')
                                    <x-forms.text data-nssf="occupation" name="nssf_occupation_number" :label="__('system.employee_nssf_occupation_number')" :value="old('nssf_occupation_number')" disabled />
                                    <div class="row">
                                        <div class="col-6">
                                            <x-forms.text data-nssf="occupation" name="nssf_occupation_join_year" :label="__('system.nssf_occupation_join_year')" :value="old('nssf_occupation_join_year')" disabled />
                                        </div>
                                        <div class="col-6">
                                            <x-forms.select data-nssf="occupation" name="nssf_occupation_join_month" :label="__('system.employee_nssf_occupation_join_month')" :value="old('nssf_occupation_join_month')" :options="$months" disabled="disabled" />
                                        </div>
                                    </div>
                                @else
                                    <x-forms.text data-nssf="occupation" name="nssf_occupation_number" :label="__('system.employee_nssf_occupation_number')" :value="old('nssf_occupation_number')" />
                                    <div class="row">
                                        <div class="col-6">
                                            <x-forms.text data-nssf="occupation" name="nssf_occupation_join_year" :label="__('system.nssf_occupation_join_year')" :value="old('nssf_occupation_join_year')" />
                                        </div>
                                        <div class="col-6">
                                            <x-forms.select data-nssf="occupation" name="nssf_occupation_join_month" :label="__('system.employee_nssf_occupation_join_month')" :value="old('nssf_occupation_join_month')" :options="$months" />
                                        </div>
                                    </div>
                                @endif
                            </x-card>
            
                            <x-card :header="__('system.employees_nssf_health')">
                                <div>
                                    <label>@lang('system.employee_nssf_health') <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="nssf_health" id="nssfHealthY" value="Y" :label="__('system.y')" :is-checked="old('nssf_health') == 'Y' ? true : false" />
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <x-forms.radio name="nssf_health" id="nssfHealthN" value="N" :label="__('system.n')" :is-checked="old('nssf_health') == 'N' ? true : false" />
                                        </div>
                                    </div>
                                    @error('nssf_health')
                                        <div class="small text-danger mb-3">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if (old('nssf_health') == 'N')
                                    <x-forms.text data-nssf="health" name="nssf_health_number" :label="__('system.employee_nssf_health_number')" :value="old('nssf_health_number')" disabled />
                                    <div class="row">
                                        <div class="col-6">
                                            <x-forms.text data-nssf="health" name="nssf_health_join_year" :label="__('system.nssf_health_join_year')" :value="old('nssf_health_join_year')" disabled />
                                        </div>
                                        <div class="col-6">
                                            <x-forms.select data-nssf="health" name="nssf_health_join_month" :label="__('system.employee_nssf_health_join_month')" :value="old('nssf_health_join_month')" :options="$months" disabled="disabled" />
                                        </div>
                                    </div>                                    
                                @else
                                    <x-forms.text data-nssf="health" name="nssf_health_number" :label="__('system.employee_nssf_health_number')" :value="old('nssf_health_number')" />
                                    <div class="row">
                                        <div class="col-6">
                                            <x-forms.text data-nssf="health" name="nssf_health_join_year" :label="__('system.nssf_health_join_year')" :value="old('nssf_health_join_year')" />
                                        </div>
                                        <div class="col-6">
                                            <x-forms.select data-nssf="health" name="nssf_health_join_month" :label="__('system.employee_nssf_health_join_month')" :value="old('nssf_health_join_month')" :options="$months" />
                                        </div>
                                    </div>
                                @endif
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
        <script src="{{ asset('assets/js/admin/create-employee.js') }}"></script>
    @endpush
</x-admin-layout>