$(document).ready(function() {
    $('#stock-table').DataTable();
    $('#customers-table').DataTable( {
        "order": [[ 1, "asc" ]]
    } );
    $('#employees-table').DataTable( {
        "order": [[ 2, "asc" ]]
    } );
    $('#orders-table').DataTable( {
        "order": [[ 0, "asc" ]]
    } );
} );

