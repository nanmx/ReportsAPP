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

function get_report(){
    $("#do_report").on('click',function(){
        let choosed=$("#report_choose").val();
        let week=$("#week").val();
        if(choosed!=='0'){
            do_report({choosed:choosed,date:week});

        }else{
            $("#msjs").replaceWith(' <div class="title_interaction_bar" id="msjs">Selecciona un tipo de reporte!!!</div>');
        }
    });
    $("#report_choose").on('change',function(){
        $("#msjs").replaceWith(' <div class="title_interaction_bar" id="msjs"></div>');
    });
}

function do_report(data){
    let module=$("#module").val();
    progress_bar();
    $.ajax({
        method: "POST",
        url:module+"/Get-Report/",
        data:data,
        dataType: 'json',
        minLength: 2,
        delay: 1,
        cache: false
        }).done(function(data){

        });


}

function progress_bar(data={title:'',txt:'',proges:'0'}){
    $("#progress_bar").css('display','block');
    let tipo =$( "#report_choose option:selected" ).text();
    let fecha =$( "#week option:selected" ).text();
    $("#txt_progres").replaceWith('<p id="txt_progres">'+data.txt+'</p> ');

}