<?php echo view("header"); ?>
<div id="content_area_wrapper">
    <div id="content_area">
        <div id="cover_interaction_bar">
            <div id="interaction_bar_top">
                <div class="title_interaction_bar" >
               <?=  Lang("Modules.".strtolower( $controller_name."_nav"));?>
                </div>
                
            </div>
            <div id="cover_buttons_interaction_bar">
				
			</div>
            <div id="interaction_bar_bottom">
            <div class="title_interaction_bar" id="msjs">
           
            </div>
                <ul id="list_interaction_bar">
                    <li  class="li_look_interaction_bar" id="li_look_manage" >
                    <div class="input-group">
                        <select class="custom-select" id="report_choose">
                        <option selected value="0">Seleccionar tipo...</option>
                        <option value="kgs">Kilogramos</option>
                        <option value="sales">Venta</option>
                        <option value="price">Precio</option>
                        <option value="cost">Costo</option>
                        <option value="profit">Margen de utilidad por venta</option>
                        </select>
                       
                      </div>
                    </li>
                    <li  class="li_look_interaction_bar" >
                    <div class="input-group">
                      <?php echo form_dropdown('week', $all_weeks, $current_week['date'],array
                    ('class'=>'custom-select','id'=>'week'));?>
                     <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="do_report">Generar</button>
                        </div>
                    </div>
                    </li>
                    <li class="li_look_interaction_bar">
                        <div class="container" id="progress_bar">
                        <h4 id="title_progres" ></h4>
                        <p id="txt_progres"></p> 
                        <div class="progress">
                        <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                        0%
                        </div>
                        </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div id="table_holder">
        </div>
        <div class="box-pagination">
        </div>
    </div>
</div>
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-first_name" id="first_name_label" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="first_name" name="in_first_name" placeholder="Escriba el nombre">
          </div>
          <div class="form-group">
            <label for="recipient-last_name" id="last_name_label" class="col-form-label">Apellido:</label>
            <input type="text" class="form-control" id="last_name" name="in_last_name" placeholder="Escriba el apellido">
          </div>
          <div class="form-group">
            <label for="recipient-username" id="username_label" class="col-form-label"> Usuario:</label>
            <input type="text" class="form-control" id="username" name="in_username" placeholder="Escriba el nombre de usuario">
          </div>
          <div class="form-group">
            <label for="recipient-password" id="password_label" class="col-form-label">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="in_password" placeholder="Escriba la contraseña">
          </div>
          <div class="form-group">
         
         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="save"> Guardar</button>
      </div>
    </div>
  </div>
</div>
<?php echo view("footer"); ?>