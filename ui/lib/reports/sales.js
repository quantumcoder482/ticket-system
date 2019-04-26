jQuery(document).ready(function($) {

    $('.outlay-datatables label').addClass('form-group');

    /*Exportable datatables*/
    $('#sales_items').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });

    $('.dt-buttons a').addClass('btn btn-primary');





});