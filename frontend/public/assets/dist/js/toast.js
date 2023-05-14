function errorToast(message) {
    Toast.fire({
        icon: 'warning',
        title: message
    });
}

function successToast(message) {
    Toast.fire({
        icon: 'success',
        title: message
    });
}

function infoToast(message) {
    Toast.fire({
        icon: 'info',
        title: message
    });
}

function successAlert(message) {
    Swal.fire(
        'Success',
        message,
        'success'
    )
}

function infoAlert(message) {
    Swal.fire(
        'Info',
        message,
        'info'
    )
}

function warningAlert(message) {
    Swal.fire(
        'Warning',
        message,
        'warning'
    )
}