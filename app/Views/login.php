<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Author" content="Adrián Ramirez | brontobytemx.com" />
        <meta name="Subject" content="Apps Mexico" />
        <meta name="GOOGLEBOT" content="INDEX, NO FOLLOW, ALL" />
        <meta name="robots" content="index, no follow" />
        <meta name="Generator" content="html" />
        <meta name="Revisit" content="1 day" />
        <meta name="Distribution" content="Global" />
        <meta name="Robots" content="All" />
        <meta property="og:url" content="<?php echo base_url()."login";?>" />
        <meta property="og:type" content="Login" />
        <meta property="og:title" content="Inicio de Sesión" />
        <meta property="og:description" content="Escriba sus datos para accesar" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#003959">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css" />
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <title>Reports Login</title>
    </head>
    <body >
        <div id="wrap_login">
            <div id="cover_login">
            <a id="cover_logo_login" href="<?php echo base_url();?>"><img id="logo_login" src="<?php echo base_url();?>assets/images/logo/logotipo.png"></a>
                <div id="container_login">
                <div class="box_login_label">
                            <label id="msj_login" ></label>
                        </div>
                    <div id="login_form">
                        <div class="box_login_label">
                            <label>Usuario:</label>
                        </div>
                                <div class="box_login_input">
                                        <?php echo form_input(
                                        array(
                                        'name'=>'username',
                                        'id'=>'username',
                                        'value'=>'',
                                        'size'=>'20')
                                        );
                                        ?>
                         <div class="box_login_label">
                            <label>Contraseña:</label>

                        </div>
                            <div class="box_login_input">
                                <?php echo form_password(
                                array(
                                'name'=>'password',
                                'id'=>'password',
                                'value'=> '',
                                'size'=>'20'
                                ));?>
                            </div>
                            <div id="box_submit_login">
                            <?php echo form_button('loginButton','Login',array('title'=>'inicia sesión',
                            'type'=>'button',"id"=>"loginButton"));?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
<script type="text/javascript">
$( document ).ready( readyFunction );
let base_url="<?php echo base_url();?>"
function readyFunction( jQuery ){
    $("#username").on("click",function(){
         $("#username").focus().select();
    });
    $("#password").on("click",function(){
         $("#password").focus().select();
    });
    $("#loginButton").on("click",function(){
        event.preventDefault(); 
        login_check();
    });
}
</script>
</html>