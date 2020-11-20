$(document).ready(function () {

    //Instantiate datatable
    $('#usersTable').DataTable({

        "columnDefs": [
            { "orderable": false, "targets": 3 }
        ]
    });

    //Frontend validation
    $("form :input").change(function () {
        $(this).password.setCustomValidity(password_confirmation.value != password.value ? "Passwords do not match." : "")
    });

});
