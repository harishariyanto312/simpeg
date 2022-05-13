const imageUploadHandler = (blobInfo, success, failure, progress) => {

    const CSRFToken = document.querySelector('meta[name="csrf-token"]').content;

    const formData = new FormData();
    formData.append('image', blobInfo.blob(), blobInfo.filename());

    fetch(uploadURL, {
        method: 'POST',
        body: formData,
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': CSRFToken
        }
    })
    .then(response => response.json())
    .then(result => {
        if (result.location) {
            success(result.location);
        }
        else if (result.errors.image.length > 0) {
            failure(result.errors.image[0]);
        }
        else {
            failure('Error');
        }
    })
    .catch(error => {
        failure('Error');
    });

};

tinymce.init({
    selector: '[data-wysiwyg="1"]',
    plugins: 'code image link lists',
    toolbar: 'undo redo | headings blocks | bold italic underline strikethrough | link image | blockquote numlist bullist | aligns | code',
    toolbar_groups: {
        headings: {
            text: 'H2',
            tooltip: 'Headings',
            items: 'h2 h3 h4'
        },
        aligns: {
            icon: 'align-left',
            tooltip: 'Aligns',
            items: 'alignleft aligncenter alignright alignjustify'
        }
    },
    mobile: {
        toolbar_mode: 'floating'
    },
    menubar: false,
    image_caption: true,
    images_upload_handler: imageUploadHandler,
    branding: false
});