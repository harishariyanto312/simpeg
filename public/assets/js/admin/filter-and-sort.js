const btnFilterAndSort = document.getElementById('btnFilterAndSort');
const menuFilterAndSort = document.getElementById('menuFilterAndSort');
btnFilterAndSort.addEventListener('click', e => {
    menuFilterAndSort.classList.toggle('d-none');

    const btnIcon = btnFilterAndSort.querySelector('i.fas');
    btnIcon.classList.toggle('fa-sliders-h');
    btnIcon.classList.toggle('fa-times');
});