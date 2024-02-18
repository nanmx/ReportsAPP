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
        <title>Reports Login</title>
    </head>
    <body >
        <div id="wrap_login">
            <div id="cover_login">
                <div id="container_login">
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
                                        'size'=>'20',
                                        'title'=>'',
                                        'autocomplete'=>'username')
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
                                'size'=>'20',
                                'title'=>'',
                                'autocomplete'=>'current-password'
                                ));?>
                            </div>
                            <div id="box_submit_login">
                            <?php echo form_submit('loginButton','Login',array('title'=>'inicia sesión',"id"=>"loginButton"));?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>