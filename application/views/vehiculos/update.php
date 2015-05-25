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
                                <legend>Editar Veh&iacute;culo</legend>                                    
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="placa">Placa del Veh&iacute;culo:</label>
                                        <input type="text" name="placa" id="placa" class="form-control" maxlength="250" required autofocus value="<?php echo $row['placa']; ?>">
                                    </div> 
                                    <div class="col-sm-3">
                                        <label for="periodo">Año:</label>
                                        <input type="text" name="periodo" id="periodo" class="form-control" maxlength="4" required value="<?php echo $row['periodo']; ?>">
                                    </div> 
                                    <div class="col-sm-3">
                                        <label for="id_tipo">Tipo:</label>
                                        <select name="id_tipo" id="id_tipo" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <?php foreach ($table_tipos as $r) : ?>
                                            <option value="<?php echo $r['id_tipo']; ?>" <?php  if($row['id_tipo']==$r['id_tipo']){ echo 'selected'; } ?>><?php echo $r['tipo']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="id_color">Color:</label>
                                        <select name="id_color" id="id_color" class="form-control" required onchange="ajax_vehiculos_table_modelos()">
                                            <option value="">SELECCIONE...</option>
                                            <?php foreach ($table_colores as $r) : ?>
                                            <option value="<?php echo $r['id_color']; ?>" <?php  if($row['id_color']==$r['id_color']){ echo 'selected'; } ?>><?php echo $r['color']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="id_marca">Marca:</label>
                                        <select name="id_marca" id="id_marca" class="form-control" required onchange="ajax_vehiculos_table_modelos()">
                                            <option value="">SELECCIONE...</option>
                                            <?php foreach ($table_marcas as $r) : ?>
                                            <option value="<?php echo $r['id_marca']; ?>" <?php  if($row['id_marca']==$r['id_marca']){ echo 'selected'; } ?>><?php echo $r['marca']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="id_modelo">Modelo:</label>
                                        <select name="id_modelo" id="id_modelo" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="<?php echo $row['id_modelo']; ?>" selected><?php echo $row['modelo']; ?></option>
                                        </select>
                                    </div>                              
                                </div>

                                <br />
                                <button type="submit" class="btn btn-default">Guardar</button>
                                <a href="<?php echo site_url($controller.'/index/'.$row_usuario['id_usuario']); ?>" class="btn btn-default">Volver</a>
                                <input type="hidden" name="id_vehiculo" value="<?php echo $row['id_vehiculo']; ?>">                                
                                <input type="hidden" name="id_propetario" value="<?php echo $row_usuario['id_usuario']; ?>">   
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