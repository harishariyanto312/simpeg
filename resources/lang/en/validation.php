<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => ':attribute tidak cocok.',
    'current_password' => 'Password salah.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => ':attribute tidak valid.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => ':attribute tidak valid.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => ':attribute tidak valid.',
    'file' => 'The :attribute must be a file.',
    'filled' => ':attribute tidak boleh kosong.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal to :value.',
        'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal to :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => ':attribute tidak valid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => ':attribute harus berupa angka.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute harus kurang dari :max.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'string' => 'Panjang :attribute harus kurang dari :max karakter.',
        'array' => 'The :attribute must not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute harus lebih dari :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'Panjang :attribute harus lebih dari :min karakter.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':attribute harus berupa angka.',
    'password' => 'Password salah.',
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => ':attribute tidak valid.',
    'required' => ':attribute tidak boleh kosong.',
    'required_if' => ':attribute tidak boleh kosong.',
    'required_unless' => ':attribute tidak boleh kosong.',
    'required_with' => ':attribute tidak boleh kosong.',
    'required_with_all' => ':attribute tidak boleh kosong.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => ':attribute dan :other harus sama.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => ':attribute tersebut sudah ada.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'nik' => 'NIK',
        'password' => 'Password',
        'employee_id' => 'Nomor Induk Karyawan',
        'first_name' => 'Nama Depan',
        'middle_name' => 'Nama Tengah',
        'last_name' => 'Nama Belakang',
        'sex' => 'Jenis Kelamin',
        'birth_place' => 'Tempat Lahir',
        'birth_date' => 'Tanggal Lahir',
        'marital_status' => 'Status Pernikahan',
        'religion' => 'Agama',
        'employee_type' => 'Jenis Tenaga Kerja',
        'blood_type' => 'Golongan Darah',
        'id_number' => 'Nomor KTP / Nomor Identitas',
        'current_address' => 'Alamat Tinggal Saat Ini',
        'current_village' => 'Desa/Kelurahan Tinggal Saat Ini',
        'current_subdistrict' => 'Kecamatan Tinggal Saat Ini',
        'current_city' => 'Kota Tinggal Saat Ini',
        'id_address' => 'Alamat Domisili Sesuai KTP',
        'id_village' => 'Desa/Kelurahan Domisili Sesuai KTP',
        'id_subdistrict' => 'Kecamatan Domisili Sesuai KTP',
        'id_city' => 'Kota Domisili Sesuai KTP',
        'home_phone' => 'Nomor Telepon Rumah',
        'mobile_phone' => 'Nomor Handphone',
        'email_address' => 'Alamat Email',
        'emergency_contact_name.*' => 'Nama',
        'emergency_contact_relationship.*' => 'Hubungan',
        'emergency_contact_phone.*' => 'Nomor Telepon',
        'education_type.*' => 'Tingkat Pendidikan',
        'education_date_aquired.*' => 'Tanggal Kelulusan',
        'education_grade.*' => 'Nilai Lulus',
        'education_school_name.*' => 'Nama Sekolah / Universitas',
        'education_city.*' => 'Kota Tempat Sekolah / Universitas',
        'education_certificate_number.*' => 'Nomor Ijazah / Sertifikat',
        'family_name.*' => 'Nama Anggota Keluarga',
        'family_relationship.*' => 'Hubungan',
        'family_sex.*' => 'Jenis Kelamin',
        'family_birth_date.*' => 'Tanggal Lahir',
        'family_status.*' => 'Status',
        'family_same_company.*' => 'Keterangan Bekerja Dalam Satu Perusahaan',
        'exp_company_name.*' => 'Nama Perusahaan',
        'exp_start_date.*' => 'Tanggal Mulai Bekerja',
        'exp_end_date.*' => 'Tanggal Akhir Bekerja',
        'exp_end_job_title.*' => 'Jabatan Terakhir',
        'exp_end_pay_rate.*' => 'Gaji Terakhir',
        'exp_job_desc.*' => 'Deskripsi Pekerjaan',
        'exp_job_remarks.*' => 'Keterangan Tambahan',
        'exp_company_city.*' => 'Kota Lokasi Perusahaan',
        'exp_company_phone.*' => 'Nomor Telepon',
        'npwp_id' => 'Nomor Pokok Wajib Pajak',
        'npwp_city' => 'Kota NPWP',
        'npwp_date' => 'Tanggal Terdaftar NPWP',
        'tax_code' => 'Kode Pajak',
        'start_date' => 'Tanggal Mulai',
        'final_date' => 'Tanggal Berakhir',
        'basic_salary' => 'Gaji Pokok',
        'salary_unit' => 'Satuan Gaji',
        'bank_branch' => 'Unit Cabang Bank',
        'bank_city' => 'Kota Pembuatan Rekening',
        'bank_cif' => 'Customer Information File',
        'bank_account_number' => 'Nomor Rekening Bank',
        'bank_account_name' => 'Nama Pada Rekening Bank',
        'nssf_occupation' => 'Keterangan Ikut BPJS Ketenagakerjaan',
        'nssf_occupation_number' => 'Nomor BPJS Ketenagakerjaan',
        'nssf_occupation_join_year' => 'Tahun Kepesertaan',
        'nssf_occupation_join_month' => 'Bulan Kepesertaan',
        'nssf_health' => 'Keterangan Ikut BPJS Kesehatan',
        'nssf_health_number' => 'Nomor BPJS Kesehatan',
        'nssf_health_join_year' => 'Tahun Kepesertaan',
        'nssf_health_join_month' => 'Bulan Kepesertaan',
        'name' => 'Nama',
        'bank_id' => 'Bank'
    ],

];
