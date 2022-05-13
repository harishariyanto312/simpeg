function attachEventHandler() {
    const deleteOptions = document.querySelectorAll('button[data-delete]');
    deleteOptions.forEach(deleteOption => {
        deleteOption.addEventListener('click', e => {
            const linkDelete = e.target.dataset.delete;
            const modalDeleteForm = document.getElementById('modalDeleteForm');
            modalDeleteForm.setAttribute('action', linkDelete);
        });
    });
}