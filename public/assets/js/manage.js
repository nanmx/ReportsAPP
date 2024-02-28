function validation_users_form(){
    let condition = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#\_\-\{\}\(\)\[\]])[A-Za-z\d@$!%*?&#\_\-\{\}\(\)\[\]]{5,}$/;
    let password=$.trim($("#password").val());
    if($.trim($("#first_name").val())===""){
        $("#first_name_label").replaceWith('<label for="recipient-first_name" id="first_name_label" class="col-form-label" style="color:red">Escriba el nombre :</label>');
        $("#first_name").focus();
        return false;
    }else if($.trim($("#last_name").val())===""){
        $("#first_name_label").replaceWith('<label for="recipient-first_name" id="first_name_label" class="col-form-label">Nombre:</label>');
        $("#last_name_label").replaceWith('<label for="recipient-last_name" id="last_name_label" class="col-form-label" style="color:red">Escriba el apellido :</label>');
        $("#last_name").focus();
        return false;
    }else if($.trim($("#username").val())===""){
        $("#last_name_label").replaceWith('<label for="recipient-last_name" id="last_name_label" class="col-form-label">Apellido:</label>');
        $("#username_label").replaceWith('<label for="recipient-username" id="username_label" class="col-form-label" style="color:red">Escriba un nombre de usuario  :</label>');
        $("#username").focus();

        return false;
    }else if(password==="" || !condition.test(password)){
        $("#username_label").replaceWith('<label for="recipient-username" id="username_label" class="col-form-label">Usuario:</label>');
        $("#password_label").replaceWith('<label for="recipient-password" id="password_label" class="col-form-label" style="color:red">Escriba una contraseña valida con numeros y signos especiales  :</label>');
        $("#password").focus();
        return false;
    }
    $("#password_label").replaceWith('<label for="recipient-password" id="password_label" class="col-form-label">Contraseña:</label>');
   let data={
        'first_name': $("#first_name").val(),
        'last_name': $("#last_name").val(),
        'username': $("#username").val(),
        'password': $("#password").val(),
}
return data;
}

function save_users_form(module){
$("#save").on('click', function(){
    let data=validation_users_form();
    if(data!=false){
        $.ajax(
            {
            method: "POST",
            url:module+"/Save/-1",
            dataType: 'json',
            data: data,
            minLength: 2,
            delay: 1,
            cache: false
            }).done(function(data){
                console.log(data);
            	if(data.success===true){
                    $('#form').modal('hide')

            
            }
        });
    }
});

}