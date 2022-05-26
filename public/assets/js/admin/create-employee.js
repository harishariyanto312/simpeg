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
    let currentEducationNumber = document.querySelectorAll('div.card[data-education]').length;
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

        changeIdAndLabel(clone, 'education_type_', 'education_type', currentEducationNumber, 'select', 'select');
        changeIdAndLabel(clone, 'education_date_aquired_', 'education_date_aquired', currentEducationNumber);

        let fieldDate = clone.querySelector('input[name="education_date_aquired[' + currentEducationNumber + ']"]');
        new Datepicker(fieldDate, {
            buttonClass: 'btn',
            autohide: true,
            format: 'dd/mm/yyyy',
            startView: 2,
            language: 'id',
        });

        changeIdAndLabel(clone, 'education_grade_', 'education_grade', currentEducationNumber);
        changeIdAndLabel(clone, 'education_school_name_', 'education_school_name', currentEducationNumber);
        changeIdAndLabel(clone, 'education_city_', 'education_city', currentEducationNumber);
        changeIdAndLabel(clone, 'education_certificate_number_', 'education_certificate_number', currentEducationNumber);

        anchorElement.after(clone);
    });

    function changeIdAndLabel(parentEl, originalLabel, newLabel, number, inputType = 'input', labelType = 'field') {
        const field = parentEl.querySelector(inputType + '[name="' + originalLabel + '"]');
        const fieldLabel = parentEl.querySelector('label[for="' + labelType + '_' + originalLabel + '"]');
        const newID = newLabel + number;
        field.name = newLabel + '[' + number + ']';
        field.id = newID;
        fieldLabel.setAttribute('for', newID);
    }

    function changeIdAndLabelRadio(parentEl, originalLabel, newLabel, number) {
        const radios = parentEl.querySelectorAll('input[type="radio"][name="' + originalLabel + '"]:not(.d-none)');
        radios.forEach(radio => {
            let radioValue = radio.value;
            let newID = newLabel + radioValue + number;
            radio.name = newLabel + '[' + number + ']';
            radio.id = newID;

            let radioLabel = parentEl.querySelector('label[for="' + originalLabel + radioValue + '"]');
            radioLabel.setAttribute('for', newID);
        });

        const radioHidden = parentEl.querySelector('input[type="hidden"][name="' + originalLabel + '"]');
        if (radioHidden) {
            radioHidden.name = newLabel + '[' + number + ']';
        }
    }

    const addFamily = document.getElementById('addFamily');
    let currentFamilyNumber = document.querySelectorAll('div.card[data-family]').length;
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

        changeIdAndLabel(clone, 'family_name_', 'family_name', currentFamilyNumber);
        changeIdAndLabelRadio(clone, 'family_sex_', 'family_sex', currentFamilyNumber);
        changeIdAndLabel(clone, 'family_relationship_', 'family_relationship', currentFamilyNumber, 'select', 'select');
        changeIdAndLabel(clone, 'family_birth_date_', 'family_birth_date', currentFamilyNumber);

        let fieldDate = clone.querySelector('input[name="family_birth_date[' + currentFamilyNumber + ']"]');
        new Datepicker(fieldDate, {
            buttonClass: 'btn',
            autohide: true,
            format: 'dd/mm/yyyy',
            startView: 2,
            language: 'id',
        });

        changeIdAndLabel(clone, 'family_status_', 'family_status', currentFamilyNumber, 'select', 'select');
        changeIdAndLabelRadio(clone, 'family_same_company_', 'family_same_company', currentFamilyNumber);

        anchorElement.after(clone);
    });

    const addExp = document.getElementById('addExp');
    let currentExpNumber = document.querySelectorAll('div.card[data-exp]').length;
    addExp.addEventListener('click', function () {
        const elem = document.getElementById('exampleExpCard').querySelector('div.card');
        let clone = elem.cloneNode(true);
        const anchorElement = document.querySelector('div.card[data-exp="' + currentExpNumber + '"]');

        currentExpNumber++;

        clone.dataset.exp = currentExpNumber;
        let expNumbers = clone.querySelectorAll('.exp-number');
        expNumbers.forEach(el => {
            el.innerHTML = currentExpNumber;
        });

        changeIdAndLabel(clone, 'exp_company_name_', 'exp_company_name', currentExpNumber);
        changeIdAndLabel(clone, 'exp_start_date_', 'exp_start_date', currentExpNumber);
        changeIdAndLabel(clone, 'exp_end_date_', 'exp_end_date', currentExpNumber);

        let fieldDate = clone.querySelector('input[name="exp_start_date[' + currentExpNumber + ']"]');
        new Datepicker(fieldDate, {
            buttonClass: 'btn',
            autohide: true,
            format: 'dd/mm/yyyy',
            startView: 2,
            language: 'id',
        });

        let fieldDate2 = clone.querySelector('input[name="exp_end_date[' + currentExpNumber + ']"]');
        new Datepicker(fieldDate2, {
            buttonClass: 'btn',
            autohide: true,
            format: 'dd/mm/yyyy',
            startView: 2,
            language: 'id',
        });

        changeIdAndLabel(clone, 'exp_end_job_title_', 'exp_end_job_title', currentExpNumber);
        changeIdAndLabel(clone, 'exp_end_pay_rate_', 'exp_end_pay_rate', currentExpNumber);
        changeIdAndLabel(clone, 'exp_job_desc_', 'exp_job_desc', currentExpNumber, 'textarea');
        changeIdAndLabel(clone, 'exp_job_remarks_', 'exp_job_remarks', currentExpNumber, 'textarea');
        changeIdAndLabel(clone, 'exp_company_city_', 'exp_company_city', currentExpNumber);
        changeIdAndLabel(clone, 'exp_company_phone_', 'exp_company_phone', currentExpNumber);

        anchorElement.after(clone);
    });

    const addEmergencyContact = document.getElementById('addEmergencyContact');
    let currentEmergencyContact = document.querySelectorAll('div.row[data-emergency-contact]').length;
    addEmergencyContact.addEventListener('click', function () {
        const elem = document.getElementById('exampleEmergencyContact').querySelector('div.row');
        let clone = elem.cloneNode(true);
        const anchorElement = document.querySelector('div.row[data-emergency-contact="' + currentEmergencyContact + '"]');
        console.log('div.row[data-emergency-contact="' + currentEmergencyContact + '"]');

        currentEmergencyContact++;

        clone.dataset.emergencyContact = currentEmergencyContact;

        changeIdAndLabel(clone, 'emergency_contact_name_', 'emergency_contact_name', currentEmergencyContact);
        changeIdAndLabel(clone, 'emergency_contact_relationship_', 'emergency_contact_relationship', currentEmergencyContact, 'select', 'select');
        changeIdAndLabel(clone, 'emergency_contact_phone_', 'emergency_contact_phone', currentEmergencyContact);

        anchorElement.after(clone);
    });

    const addressIsSameSwitch = document.getElementById('addressIsSame');
    addressIsSameSwitch.addEventListener('change', function () {
        const currentAddressFields = document.querySelectorAll('[data-address="current"]');
        currentAddressFields.forEach(el => {
            if (addressIsSameSwitch.checked) {
                el.setAttribute('disabled', true);
                el.value = '';
                el.classList.remove('is-invalid');
            }
            else {
                el.removeAttribute('disabled');
            }
        });
    });

    function nssfListener(type)  {
        const nssfRadio = document.querySelectorAll('input[name="nssf_' + type + '"]');
        nssfRadio.forEach(el => {
            el.addEventListener('change', function () {
                const currentValue = el.value;
                const nssfFields = document.querySelectorAll('input[data-nssf="' + type + '"], select[data-nssf="' + type + '"]');
                nssfFields.forEach(field => {
                    if (currentValue == 'Y') {
                        field.removeAttribute('disabled');
                    }
                    else {
                        field.setAttribute('disabled', true);
                        field.value = '';
                        field.classList.remove('is-invalid');
                    }
                });
            });
        });
    }

    nssfListener('occupation');
    nssfListener('health');
});