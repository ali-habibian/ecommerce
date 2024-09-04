// resources/js/formHelper.js

export function submitAjaxForm(url, method, formData, redirectUrl = null) {
    Swal.fire({
        title: 'لطفا کمی صبر کنید',
        allowOutsideClick: false,
        allowEscapeKey: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: url,
        type: method,
        dataType: 'json',
        data: formData,
        success: ({ success }) => {
            Swal.fire({
                title: success,
                icon: 'success',
            }).then(() => {
                if (redirectUrl) {
                    location.replace(redirectUrl);
                } else {
                    location.reload(); // Refresh the current page
                }
            });
        },
        error: err => {
            if (err.status === 422) {
                Swal.close();

                const { errors } = err.responseJSON;

                // Clear any previous error messages
                $('.invalid-feedback').html('');

                // Loop through the errors and display them
                Object.entries(errors).forEach(([key, value]) => {
                    $(`#${key}-error`).html(value[0]);
                    $(`#${key}`).addClass('is-invalid');
                });
            } else {
                Swal.fire({
                    title: `خطایی رخ داد ${err.status}`,
                    text: 'لطفا مجددا تلاش کنید',
                    icon: 'error'
                });
                console.error(err);
            }
        }
    });
}

export function submitAjaxFormWithImage(url, method, formData, redirectUrl = null) {
    Swal.fire({
        title: 'لطفا کمی صبر کنید',
        allowOutsideClick: false,
        allowEscapeKey: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: url,
        type: method,
        dataType: 'json',
        processData: false, // Prevent jQuery from processing the data
        contentType: false, // Let the browser set the correct content type
        data: formData,
        success: ({ success }) => {
            Swal.fire({
                title: success,
                icon: 'success',
            }).then(() => {
                if (redirectUrl) {
                    location.replace(redirectUrl);
                } else {
                    location.reload(); // Refresh the current page
                }
            });
        },
        error: err => {
            if (err.status === 422) {
                Swal.close();

                const { errors } = err.responseJSON;

                // Clear any previous error messages
                $('.invalid-feedback').html('');

                // Loop through the errors and display them
                Object.entries(errors).forEach(([key, value]) => {
                    $(`#${key}-error`).html(value[0]);
                    $(`#${key}`).addClass('is-invalid');
                });
            } else {
                Swal.fire({
                    title: `خطایی رخ داد ${err.status}`,
                    text: 'لطفا مجددا تلاش کنید',
                    icon: 'error'
                });
                console.error(err);
            }
        }
    });
}
