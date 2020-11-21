$(document).ready(function () {

    //Instantiate datatable
    $('#usersTable').DataTable({
        responsive: true,
        "oLanguage": { "sSearch": '<a class="btn searchBtn" id="searchBtn"><i class="fa fa-search"></i></a>' },
        "columnDefs": [
            { "orderable": false, "targets": 3 }
        ],


    });



    //Enable tooltips
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });


    //Conifrm deletion of user
    $('.delete-user-btn').click(function (e) {


        var deleteURL = $(this).attr('href');
        var userName = $(this).data('username');

        e.preventDefault();

        swal({
            title: "Are you sure you want to delete " + userName + "?",
            text: "Once deleted, you will not be able to recover this user",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = deleteURL;
                } else {
                    swal("Deleting cancelled");
                }
            });
        return false;





    });





});
