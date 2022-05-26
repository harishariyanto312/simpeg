<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.employees')</x-slot>

    @if (session('error'))
        <x-alert type="danger">{{ session('error') }}</x-alert>
    @endif

    @if (session('status'))
        <x-alert>{{ session('status') }}</x-alert>
    @endif

    <div class="mb-3 d-flex justify-content-between">
        <div></div>
        <div>
            <a href="{{ route('employees.create') }}" class="btn btn-primary">@lang('system.employees_create')</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table 
                data-toggle="table"
                data-url="{{ route('employees.index.json') }}"
                data-side-pagination="server"
                data-pagination="true"
                data-search="true"
                data-fixed-columns="true"
                data-fixed-number="1"
                data-fixed-right-number="0"
                data-show-columns="true"
                data-show-columns-toggle-all="true"
                data-buttons-class="primary"
                data-show-fullscreen="true">
                <thead>
                    <tr>
                        <th data-field="name" data-sortable="true" data-class="bg-light" data-switchable="false">@lang('system.employee_full_name')</th>
                        <th data-field="employee_id" data-visible="true">@lang('system.employee_id_short')</th>
                        <th data-field="sex">@lang('system.employee_sex')</th>
                        <th data-field="birth_place">@lang('system.employee_birth_place')</th>
                        <th data-field="date_of_birth">@lang('system.employee_birth_date')</th>
                        <th data-field="marital_status">@lang('system.employee_marital_status')</th>
                        <th data-field="religion">@lang('system.employee_religion')</th>
                        <th data-field="employee_type">@lang('system.employee_type_expatriate')</th>
                        <th data-field="blood_type">@lang('system.employee_blood_type')</th>
                        <th data-field="id_number">@lang('system.employee_id_number')</th>
                        <th data-field="id_address">@lang('system.employee_id_address')</th>
                        <th data-field="id_village">@lang('system.employee_id_village')</th>
                        <th data-field="id_subdistrict">@lang('system.employee_id_subdistrict')</th>
                        <th data-field="id_city">@lang('system.employee_id_city')</th>
                        <th data-field="current_address">@lang('system.employee_current_address')</th>
                        <th data-field="current_village">@lang('system.employee_current_village')</th>
                        <th data-field="current_subdistrict">@lang('system.employee_current_subdistrict')</th>
                        <th data-field="current_city">@lang('system.employee_current_city')</th>
                        <th data-field="home_phone">@lang('system.employee_home_phone')</th>
                        <th data-field="mobile_phone">@lang('system.employee_mobile_phone')</th>
                        <th data-field="email_address">@lang('system.employee_email_address')</th>
                        <th data-field="npwp_id">@lang('system.employees_npwp')</th>
                        <th data-field="npwp_city">@lang('system.employee_npwp_city')</th>
                        <th data-field="npwp_date">@lang('system.employee_npwp_date')</th>
                        <th data-field="tax_code">@lang('system.employee_tax_code')</th>
                        <th data-field="start_date">@lang('system.employee_start_date_short')</th>
                        <th data-field="final_date">@lang('system.employee_final_date_short')</th>
                        <th data-field="basic_salary">@lang('system.employee_basic_salary')</th>
                        <th data-field="salary_unit">@lang('system.employee_salary_unit')</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tables/bootstrap-table.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tables/bootstrap-table-fixed-columns.min.css') }}">
        <style>
            th, td {
                white-space: nowrap;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/plugins/bootstrap-tables/bootstrap-table.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-tables/bootstrap-table-fixed-columns.min.js') }}"></script>
    @endpush
</x-admin-layout>