    <div class="container">
    
    <div class="row">
      <div class="col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>DATOS DEL CLIENTE</h4>  
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-6">
                <p><b>C&eacute;dula de Identidad:</b> <?php echo $row_usuario['identidad']; ?></p>
              </div>
              <div class="col-xs-6">
                <p><b>Apellidos y Nombres:</b> <?php echo $row_usuario['apellidos'].' '.$row_usuario['nombres']; ?></p>
              </div>
              <div class="col-xs-6">
                <p><b>Direcci&oacute;n:</b> <?php echo $row_usuario['direccion']; ?></p>
              </div>
              <div class="col-xs-6">
                <p><b>Tel&eacute;fono:</b> <?php echo $row_usuario['telefono']; ?></p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>DATOS DEL VEHICULO</h4>  
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-4">
                <p><b>Placa:</b> <?php echo $row_vehiculo['placa']; ?></p>
              </div>
              <div class="col-xs-4">
                <p><b>Año:</b> <?php echo $row_vehiculo['periodo']; ?></p>
              </div>
              <div class="col-xs-4">
                <p><b>Color:</b> <?php echo $row_vehiculo['color']; ?></p>
              </div>
              <div class="col-xs-4">
                <p><b>Tipo:</b> <?php echo $row_vehiculo['tipo']; ?></p>
              </div>
              <div class="col-xs-4">
                <p><b>Marca:</b> <?php echo $row_vehiculo['marca']; ?></p>
              </div>
              <div class="col-xs-4">
                <p><b>Modelo:</b> <?php echo $row_vehiculo['modelo']; ?></p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    <div class="row">                            
            <div class="col-sm-12">
                <div class="box">
                            <?php 
                            if (!empty($alert['success'])) {
                            foreach ($alert['success'] as $key => $value) { 
                            ?>                            
                                <div class="alert alert-success"><?php echo $value; ?></div>
                            <?php 
                                }} 
                            ?>

                            <?php 
                            if (!empty($alert['info'])) {
                            foreach ($alert['info'] as $key => $value) { ?>                            
                                <div class="alert alert-info"><?php echo $value; ?></div>
                            <?php 
                                }} 
                            ?>

                            <?php 
                            if (!empty($alert['warning'])) {
                            foreach ($alert['warning'] as $key => $value) { 
                            ?>                            
                                <div class="alert alert-warning"><?php echo $value; ?></div>
                            <?php 
                                }} 
                            ?>

                            <?php 
                            if (!empty($alert['danger'])) {
                            foreach ($alert['danger'] as $key => $value) { 
                            ?>                            
                                <div class="alert alert-danger"><?php echo $value; ?></div>
                            <?php 
                                }} 
                            ?>

                            <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>   

                            <div class="panel panel-default">      
                            <div class="panel-body">

                            	<?php 
                                    $at = array('role'=>'form');
                                    echo form_open('',$at); 
                                ?>

                            	<fieldset>
                                <legend>Crear Servicio</legend>                                    
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="fecha">Fecha:</label>
                                        <div class="input-group date" id="datepicker" data-date="<?php echo date("d/m/Y"); ?>" data-date-format="dd/mm/yyyy"> 
                                        <input type="text" name="fecha" class="form-control" type="text" readonly="" value="<?php echo date("d/m/Y"); ?>" required> 
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i>
                                        </span> 
                                        </div>  
                                    </div> 
                                    <div class="col-sm-3">
                                        <label for="costo">Costo:</label>
                                        <input type="text" name="costo" id="costo" class="form-control" maxlength="250" required autofocus>
                                    </div> 
                                    <div class="col-sm-3">
                                        <label for="id_mantenimiento">Mantenimiento:</label>
                                        <select name="id_mantenimiento" id="id_mantenimiento" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <?php foreach ($table_mantenimientos as $r) : ?>
                                            <option value="<?php echo $r['id_mantenimiento']; ?>"><?php echo $r['mantenimiento']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="id_area">&Aacute;rea:</label>
                                        <select name="id_area" id="id_area" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <?php foreach ($table_areas as $r) : ?>
                                            <option value="<?php echo $r['id_area']; ?>"><?php echo $r['area']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="descripcion">Descripci&oacute;n:</label>
                                        <textarea name="descripcion" class="form-control" rows="10" required></textarea>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="observacion">Observaci&oacute;n:</label>
                                        <textarea name="observacion" class="form-control" rows="10"></textarea>
                                    </div>                              
                                </div>

                                <br />
                                <button type="submit" class="btn btn-default">Guardar</button>
                                <a href="<?php echo site_url($controller.'/index/'.$row_usuario['id_usuario'].'/'.$row_vehiculo['id_vehiculo']); ?>" class="btn btn-default">Volver</a>
                                <input type="hidden" name="id_vehiculo" value="<?php echo $row_vehiculo['id_vehiculo']; ?>">   
                                <input type="hidden" name="id_usuario" value="<?php echo $session['id_usuario']; ?>">                                                         
                                
                                </fieldset>   
                                
                                <?php 
                                    echo form_close(); 
                                ?>

                            </div>
                            </div>
                </div>
            </div>                            
    </div>
    </div>