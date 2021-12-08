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






$("#btnPreview").click(function(){
    console.log("AA");
    const checked = $(this).val();
    console.log(checked);

    request = $.ajax({
        url: 'handler/get.php',
        type: 'post',
        data: { 'id': checked  },
        dataType: 'json'
    });


    request.done(function (response, textStatus, jqXHR) {
        console.log('Popunjena');
        $('#descriptionPreview').val(response[0]['description']);
        console.log(response[0]['description']);

        $('#pricePreview').val(response[0]['price'].trim());
    

        $('#userPreview').val(response[0]['user'].trim());
    
        document.getElementById("descriptionPreview").innerHTML= response[0]['description'].trim();

   ;
 

 

        
       /* if (response[0]['carName'].toUpperCase().includes("AUDI")) {
            document.getElementById("Img").src = 'img/audi_logo.png';
        } else if (response[0]['carName'].toUpperCase().includes("BMW")) {
            document.getElementById("Img").src = 'img/bmw.jfif';
        } else if (response[0]['carName'].toUpperCase().includes("JAGUAR")) {
            document.getElementById("Img").src = 'img/jaguar.png';
        }
        else {
            document.getElementById("Img").src = 'http://placehold.it/100x100';
        }
*/
        console.log(response);
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('The following error occurred: ' + textStatus, errorThrown);
    });






});



