$(document).ready(function() {
    $('#stock-table').DataTable();
    $('#customers-table').DataTable();
    $('#employees-table').DataTable( {
        "order": [[ 2, "asc" ]]
    } );;

} );

