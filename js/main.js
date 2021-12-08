$('#addform').submit(function () {
 
    event.preventDefault();  
    
    const $form = $(this);
 
    const $input = $form.find('input,select,button,textarea');
 
    const serijalizacija = $form.serialize();  
    console.log(serijalizacija); 

    $input.prop('disabled', true);   


    request = $.ajax({  
        url: 'handler/add.php',  
        type: 'post',
        data: serijalizacija
    });

    request.done(function (response, textStatus, jqXHR) {
        
 
            alert("Telefon dodat ");
            console.log("Uspesno dodavanje");
            location.reload(true);
        
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('Greska: ' + textStatus, errorThrown);
    });
});
