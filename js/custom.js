jQuery(document).ready(function(){
    jQuery('#brad').DataTable({
        dom: 'Bfrtip',
        buttons:[
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
            }
        ]
    });
});