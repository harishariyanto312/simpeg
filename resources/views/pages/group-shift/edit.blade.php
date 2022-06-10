<x-admin-layout :breadcrumb="$breadcrumb">
    <x-slot name="page_title">@lang('system.group_shift_edit')</x-slot>

    <div class="row">
        <div class="col-12 col-lg-6">
            @if (session('status'))
                <x-alert>{{ session('status') }}</x-alert>
            @endif

            <x-card>
                <form action="{{ route('group-shift.update', ['group_shift' => $group_shift]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <x-forms.text name="name" :label="__('system.group_shift_name')" :value="old() ? old('name') : $group_shift->group_shift" />

                    <button class="btn btn-primary" type="submit">
                        @lang('system.save')
                    </button>
                </form>
            </x-card>
        </div>
    </div>
</x-admin-layout>