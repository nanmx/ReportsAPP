function login_check(){
    $("#msj_login").replaceWith('<label id="msj_login"> </label>');
if(login_validation()){

}
}

function login_validation(){
    let password=$("#password").val();
    let username=$("#username").val();
    if(username===""){
        $("#msj_login").replaceWith('<label id="msj_login" style="color:red;">Escribe tu usuario </label>');
        $("#username").focus().select();
        return false;
    }else if(password===""){
        $("#msj_login").replaceWith('<label id="msj_login" style="color:red;">Escribe tu contraseña</label>');
        $("#password").focus().select();
        return false;
    }else {
        login_ajax(username,password);
       
    }

}
function login_ajax(username,password){
    $.ajax(
        {
        method: "POST",
        url:"LoginValidation/",
        data: {username:username,password:password},
        dataType: 'json',
        minLength: 2,
        delay: 1,
        async: false,
        cache: false
        }).done(function(data){
            let resp=data.success;
            if(!resp){
                $("#msj_login").replaceWith('<label id="msj_login" style="color:red;">Error del usuario o contraseña</label>');
            }else{
                window.location.replace($("#base_url").val()+'Panel-Principal');
            }
        });

}