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

function deletePhone( deleteid){
    $.ajax({
        url: 'handler/delete.php',
        type: 'post',
        data: { deletesend: deleteid  },
        
        success: function(data, status){
            location.reload(true);
            alert("Uspesno obrisano!");
        }
    });
}

function getDetailsPreviewModal(previewid){
    $('#hiddenData').val(previewid);  //postavljamo vrednost skrivenog polja da bude id od telefona koji treba da azuriramo 

    $.post("handler/get.php",{previewid:previewid},function(data,status){
 
        var phoneid=JSON.parse(data);//uzimamo podatke i parsisamo ih u JSON
        console.log(phoneid);        //uzimamo podatke iz baze i cuvamo ih u input field
        console.log(phoneid.model);
        $('#userPreview').text("   " + phoneid.firstname);
        $('#modelPreview').text("   " + phoneid.model);
        $('#descriptionPreview').text("   " +  phoneid.description);
        $('#pricePreview').text("   " +  phoneid.price);


        if (phoneid.model.toUpperCase().includes("APPLE") || phoneid.model.toUpperCase().includes("IPHONE") ) {
            document.getElementById("Img").src = 'images/apple.png';
        } else if (phoneid.model.toUpperCase().includes("SAMSUNG")) {
            document.getElementById("Img").src = 'images/samsung.png';
        } else if (phoneid.model.toUpperCase().includes("NOKIA")) {
            document.getElementById("Img").src = 'images/nokia.png';
        }else if (phoneid.model.toUpperCase().includes("LENOVO")) {
            document.getElementById("Img").src = 'images/lenovo.png';
        }else if (phoneid.model.toUpperCase().includes("XIAOMI")) {
            document.getElementById("Img").src = 'images/xiaomi.png';
        }else if (phoneid.model.toUpperCase().includes("HUAWEI")) {
            document.getElementById("Img").src = 'images/huawei.png';
        }
        else {
            document.getElementById("Img").src = 'http://placehold.it/100x100';
        }



    });
}

function getDetailsUpdateModal(updateid){
    $('#hiddenData').val(updateid);  //postavljamo vrednost skrivenog polja da bude id od telefona koji treba da azuriramo 

    $.post("handler/get.php",{updateid:updateid},function(data,status){
        console.log(status);
        console.log(updateid);
        console.log(data);
        var phoneid=JSON.parse(data);//uzimamo podatke i parsisamo ih u JSON
        console.log(phoneid);        //uzimamo podatke iz baze i cuvamo ih u input field
        console.log(phoneid.model);
        $('#modelupdate').val(phoneid.model);
        $('#descriptionupdate').val(phoneid.description);
        $('#priceupdate').val(phoneid.price);

    });


}

/*function updatePhone(){
    //preuzimamo vrednosti koje je korisnik upisao u polja 
    var modelupdate =  $('#modelupdate').val();
    var descriptionupdate =  $('#descriptionupdate').val();
    var priceupdate =  $('#priceupdate').val();
    var  hiddendata = $('#hiddenData').val(); //uzimamo onaj sakriveni id da bismo znali o kom telefonu se radi






}*/
$('#updateform').submit(function () {
 
    event.preventDefault();

    const $form =  $(this);
 
    const $inputs = $form.find('input, select, button, textarea');
 
    const serializedData = $form.serialize();
 
    $inputs.prop('disabled', true);

 
    request = $.ajax({
        url: 'handler/update.php',
        type: 'post',
        data: serializedData
    })

    request.done(function (response, textStatus, jqXHR) {
 
        $('#updateModal').modal('hide');
        location.reload(true);
        $('#updateform').reset;

    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('The following error occurred: ' + textStatus, errorThrown);
    });



});
function viewPhone(previewid){

    $.ajax({
        url: 'handler/get.php',
        type: 'post',
        data: { previewsend: previewid  },
        
        success: function(data, status){
             

            
        }
    });


}







