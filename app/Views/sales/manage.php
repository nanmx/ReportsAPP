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
				
			</div>
            <div id="interaction_bar_bottom">
                <ul id="list_interaction_bar">
                    <li  class="li_look_interaction_bar" id="li_look_manage" >
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04">
                        <option selected>Seleccionar tipo...</option>
                        <option value="1">Kilogramos</option>
                        <option value="2">Precio</option>
                        <option value="2">Costo</option>
                        <option value="3">Margen de utilidad por venta</option>
                        </select>
                        <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Generar</button>
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