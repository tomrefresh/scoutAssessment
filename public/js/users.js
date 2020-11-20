$(document).ready(function () {

    //Instantiate datatable
    $('#usersTable').DataTable({
        "oLanguage": { "sSearch": '<a class="btn searchBtn" id="searchBtn"><i class="fa fa-search"></i></a>' },
        "columnDefs": [
            { "orderable": false, "targets": 3 }
        ],


    });

    //Frontend validation
    $("form :input").change(function () {
        $(this).password.setCustomValidity(password_confirmation.value != password.value ? "Passwords do not match." : "")
    });

});
