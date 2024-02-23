<?php echo view("header"); ?>
<div id="content_area_wrapper">
    <div id="content_area">
        <div id="cover_interaction_bar">
            <div id="interaction_bar_top">
                <div id="title_interaction_bar" >
               <?=  Lang("Modules.".strtolower( $controller_name."_nav"));?>
                </div>
                
            </div>
            <div id="cover_buttons_interaction_bar">
					<?php echo anchor(url_title(Lang($controller_name.'.nav'))."/Form/-1",
				"<div class='buttons_interaction_bar' title='Nuevo Usuario' > <span>Nuevo Usuario</span></div>",
				array('class'=>'ajax-popup-link','data-toggle'=>'modal','data-target'=>'#form'));
				?>
			</div>
        </div>
        <div id="table_holder">
            <?php echo $manage_table; ?>
        </div>
        <div class="box-pagination">
            <?= $links ?>
        </div>
    </div>
</div>
<?php echo view("footer"); ?>