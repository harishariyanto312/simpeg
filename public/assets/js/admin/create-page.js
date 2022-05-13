const fieldTitle = document.getElementById('field_title');
const fieldSlug = document.getElementById('field_slug');
fieldTitle.addEventListener('change', e => {
    const title = e.target.value;

    const CSRFToken = document.querySelector('meta[name="csrf-token"]').content;

    const formData = new FormData();
    formData.append('slug', title);

    fetch(slugURL, {
        method: 'POST',
        body: formData,
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': CSRFToken
        }
    })
    .then(response => response.json())
    .then(result => {
        fieldSlug.value = result.slug;
    })
    .catch(error => {
        console.log('Error');
    });
});