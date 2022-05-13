const datePickerEls = document.querySelectorAll('input[data-is-date="1"]');
datePickerEls.forEach(el => {
    new Datepicker(el, {
        buttonClass: 'btn',
        autohide: true,
        format: 'dd/mm/yyyy',
        startView: 2,
        language: 'id',
        defaultViewDate: el.dataset.default
    });
});