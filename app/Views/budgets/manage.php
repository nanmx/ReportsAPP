<?php echo view("header"); ?>
<div id="content_area_wrapper">
    <div id="content_area">
        <div id="cover_interaction_bar">
            <div id="interaction_bar_top">
                <div class="title_interaction_bar" >
            <h1>   <?=  Lang("Modules.".strtolower( $controller_name."_nav"));?></h1>
                </div>
                
            </div>
            <div id="cover_buttons_interaction_bar">
					<?php echo anchor(url_title(Lang($controller_name.'.nav'))."/Form/-1",
				"<div class='buttons_interaction_bar' title='Agregar Presupuesto' > <span>Agregar Presupuesto</span></div>",
				array('class'=>'ajax-popup-link','data-toggle'=>'modal','data-target'=>'#form','data-whatever'=>'Agregar Presupuesto'));
				?>
			</div>
            <div id="interaction_bar_bottom">
            <div class="title_interaction_bar" id="msjs">
           
            </div>
                <ul id="list_interaction_bar">
                    <li  class="li_look_interaction_bar" id="li_look_manage" >
                
                    </li>
                    <li  class="li_look_interaction_bar" >
                    <div class="input-group">
                  
                     <div class="input-group-append">
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
          <div class="container" id="result_report">
            <h3 id="title_report"></h3>
            
           
          
          </div>

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
            <label for="recipient-first_name" id="first_name_label" class="col-form-label">Sucursal:</label>
            <select class="custom-select" id="type">
                        <option selected value="0">Seleccionar sucursal...</option>
                        <option value="MTRZ">Matriz</option>
                        </select>
          </div>
          <div class="form-group">
            <label for="recipient-first_name" id="first_name_label" class="col-form-label">Tipo de presupuesto:</label>
            <select class="custom-select" id="type">
                        <option selected value="0">Seleccionar tipo...</option>
                        <option value="kgs">Kilogramos</option>
                        <option value="sales">Venta</option>
                        <option value="price">Precio</option>
                        <option value="cost">Costo</option>
                        <option value="profit">Margen de utilidad por venta</option>
                        </select>
          </div>
          <div class="form-group">
            <label for="recipient-last_name" id="last_name_label" class="col-form-label">Mes:</label>
            <select class="custom-select" id="month">
                        <option selected value="0">Seleccionar mes...</option>
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                        </select>
          </div>
          <div class="form-group">
            <label for="recipient-username" id="username_label" class="col-form-label"> Año:</label>
            <?php echo form_dropdown('year', $years, date("Y"),array
                    ('class'=>'custom-select','id'=>'year'));?>
           
          </div>
          <div class="form-group">
            <label for="recipient-budget" id="budget_label" class="col-form-label">Presupuesto:</label>
            <input type="text" class="form-control" id="budget" name="in_budget" placeholder="Escriba el presupuesto">
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