<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.employee_status_create')</x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">
            @if (session('status'))
                <x-alert>{{ session('status') }}</x-alert>
            @endif

            <x-card>

                <form action="{{ route('employee-status.store') }}" method="POST">
                    @csrf

                    <x-forms.text name="name" :label="__('system.employee_status_name')" :value="old('name')" />

                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="hasEndDate" value="Y" name="has_end_date" {{ old('has_end_date') == 'Y' ? 'checked' : '' }}>
                            <label for="hasEndDate" class="custom-control-label">@lang('system.employee_status_has_end_date')</label>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">
                        @lang('system.save')
                    </button>
                </form>

            </x-card>
        </div>
    </div>
</x-admin-layout>