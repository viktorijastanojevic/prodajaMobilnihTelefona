function countvalue($val){
    $.ajax({
        type: 'POST',
        url: 'updatedata.php', //call storeemdata.php to store form data
        data: { 
        val: $val
        },
        success: function(response ) { 
            var ajaxDisplay = document.getElementById('showvotebar');
            ajaxDisplay.innerHTML = response;
        }
    });
}