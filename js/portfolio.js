$(document).ready(function (){
    $('.edit-btn').on('click', function(){
        $('#editModal').modal('show');
        
        $tr = $(this).closest('tr');

        let data = $tr.children("td").map(function(){
           return $(this).text(); 
        });
        
        $('#ticker_id').val(data[0]);
        $('#ticker').val(data[1]);
        $('#company').val(data[2]);
        $('#shares').val(data[3]);
        $('#price').val(data[4].slice(1, 50));
    });
    
    $('.delete-btn').on('click', function(){
        $('#deleteModal').modal('show');

        $tr = $(this).closest('tr');

        let data = $tr.children("td").map(function(){
           return $(this).text(); 
        });

        $('#del_ticker_id').val(data[0]);
        $('#del_ticker').val(data[1]);
        $('#del_company').val(data[2]);
        $('#del_shares').val(data[3]);
        $('#del_price').val(data[4].slice(1, 50));
        console.log(data);
    });
});