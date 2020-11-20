$(document).ready(function () {

    //Instantiate datatable
    $('#usersTable').DataTable({
        "oLanguage": { "sSearch": '<a class="btn searchBtn" id="searchBtn"><i class="fa fa-search"></i></a>' },
        "columnDefs": [
            { "orderable": false, "targets": 3 }
        ],


    });


});
