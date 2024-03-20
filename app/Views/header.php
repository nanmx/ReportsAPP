<!DOCTYPE html>
<html lang="es">
<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="Author" content="Adrián Ramirez | brontobytemx.com" />
		<meta name="Subject" content="Apps Mexico" />
		<meta http-equiv="Expires" content="0">
		<meta http-equiv="Last-Modified" content="0">
		<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
		<meta http-equiv="Pragma" content="no-cache">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css" />
	
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css" />
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
		<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/manage.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,300italic,700|Raleway:400,300,500|Lato:400,600,700,900|Nunito+Sans:400,600,700|Cabin:400,600,500|Open+Sans+Condensed:300|Open+Sans:300,400,600,700|Oxygen:400,300|Loved+by+the+King|Patrick+Hand+SC|Advent+Pro|Alegreya+Sans+SC|Basic|Farsan|Julius+Sans+One|Marcellus+SC|Marck+Script|Tauri|Voltaire|Cabin+Condensed|Roboto+Condensed|Montserrat:400,500,600,800|PT+Sans:400,700" rel="stylesheet" type="text/css">
        <title>Reports  | <?php echo  Lang("Modules.".strtolower($controller_name)."_nav");  ?></title>
<head>
<body>
    <header id="header_menu">
        <div class="accordion" id="accordion">
			<div class="accordion-group">
				<div class="accordion-heading">
                    <a  class="accordion-toggle collapsed" id="c-tog-menu" data-toggle="collapse" data-parent="#accordion" href="#ans2">
                        <div id="cover_log_menu">
                            <div id="cover_menu_ico" class="cover_menu_ico">
                                <div id="ico_menu" class="icon_menu">
                                    <span></span>
                                </div>
                            </div>
                            <div id="cover_logo"><img id="logo-menu" src="<?php echo base_url();?>assets/images/logo/logotipo.svg"></div>
                        </div>
                    </a>
                    <div id="box_config_header">
							<div id="box_user">
								<div class="accordion" id="accordion_user">
									<div  id="acco-group" class="accordion-group">
										<div class="accordion-heading">
											<a class="accordion-toggle "  id="c-tog-user"  data-toggle="collapse" data-parent="#accordion_user" href="#ans4">
												<img class="" src="/assets/images/icon_cct/user-img-ico.svg">
											</a>
										</div>
										<div id="ans4" class="accordion-body collapse">
											<div class="accordion-inner">
												<div class="triangle_notif"></div>
												<ul id="list_user">
													<li id="btn-logout"><?php echo anchor("Salir",'Salir'); ?></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
                    
                    <div id="box_name_user">
                        <span>Bienvenido <?php echo $user_info->first_name." ".$user_info->last_name; ?></span>
                    </div>
                    <div id="menu_date">
								<?php
								echo "<b>".selected_hour().":".selected_minute()." hrs ".selected_day()."/".selected_month()."/".selected_year()."</b>";
								?>
					</div>

                	</div>
				</div>
                <div id="ans2" class="accordion-body collapse">
						<div class="accordion-inner">
							<div id="cover_navigation_modules_header" class="nav_container">
								<?php
									 echo $nav;
								?>
							</div>
						</div>
					</div>
            </div>
        </div>
    </header>
	<input id="module" type="hidden" value="<?php echo  url_title(Lang("Modules.".strtolower($controller_name)."_nav"));  ?>">
	<script type="text/javascript">
$( document ).ready( readyFunction );
let base_url="<?php echo base_url();?>"
function readyFunction( jQuery ){
let module="<?= $controller_name?>";
if(module==="Users"){
	module="<?php echo  url_title(Lang("Modules.".strtolower($controller_name)."_nav"));  ?>";
	save_users_form(module);

}else if(module==="Sales"){
get_report();

}else if(module==="Budgets"){
	module="<?php echo  url_title(Lang("Modules.".strtolower($controller_name)."_nav"));  ?>";
	save_budgets_form(module);
}
	$("#content_area_wrapper").on("click",function()
				{
					if($("#c-tog-menu").attr("class")=="accordion-toggle"){
						$("#c-tog-menu").trigger('click');
					}
					if($("#c-tog-notifi").attr("class")=="accordion-toggle"){
						$("#c-tog-notifi").trigger('click');
					}
				});
				$(".accordion-body").on("click",function(){
					if($("#c-tog-menu").attr("class")=="accordion-toggle"){
						$("#c-tog-menu").trigger('click');
					}
					if($("#c-tog-notifi").attr("class")=="accordion-toggle"){
						$("#c-tog-notifi").trigger('click');
					}
				});
			$('#c-tog-menu').on("click", function() {
			  $(this).toggleClass('cover_menu_ico').toggleClass('animate_ico_menu');
			});
	}
</script>