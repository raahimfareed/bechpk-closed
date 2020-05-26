$(document).ready(function(){
    $('.logout_trigger').click(function(event){
        event.preventDefault();
        $.ajax({
            url: 'ajax/handler/logout.ajax.php',
            type: 'GET',
            cache: false,
            success: function(data) {
                if (data == 1) {
                    location.reload();
                }
            }
        });
    });
});