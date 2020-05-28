$(document).ready(function() {
    
    function UpdateSearchData() {
        $.ajax({
            url: 'ajax/handler/update_search.ajax.php',
            type: 'POST',
            cache: false,
            success: function(data) {
                var navSearch = M.Autocomplete.getInstance(document.getElementById('search'));
                navSearch.updateData(data);
            }
        });
    }

    UpdateSearchData();
    setInterval(UpdateSearchData, (5 * 60 * 1000));
});