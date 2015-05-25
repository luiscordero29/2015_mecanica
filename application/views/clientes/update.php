    <div class="container">
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
                                <legend>Editar Administrador</legend>                                    
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="identidad">Cedula de Identidad:</label>
                                        <input type="text" name="identidad" id="identidad" class="form-control" maxlength="15" required value="<?php echo $row['identidad']; ?>">
                                    </div> 
                                    <div class="col-sm-6">
                                        <label for="sexo">Sexo:</label>
                                        <select name="sexo" id="sexo" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="MASCULINO" <?php if($row['sexo']=='MASCULINO'){ echo 'selected'; } ?>>MASCULINO</option>
                                            <option value="FEMENINO" <?php if($row['sexo']=='FEMENINO'){ echo 'selected'; } ?>>FEMENINO</option>
                                        </select>
                                    </div>                                   
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="apellidos">Apellidos:</label>
                                        <input type="text" name="apellidos" id="apellidos" class="form-control" maxlength="120" required value="<?php echo $row['apellidos']; ?>" >
                                    </div>                                    
                                    <div class="col-sm-6">
                                        <label for="nombres">Nombres:</label>
                                        <input type="text" name="nombres" id="nombres" class="form-control" maxlength="120" required value="<?php echo $row['nombres']; ?>">
                                    </div>                                    
                                </div>

                                <div class="row">     
                                    <div class="col-sm-12">
                                        <label for="correo">Correo:</label>
                                        <input type="text" name="correo" id="correo" class="form-control" maxlength="250" value="<?php echo $row['correo']; ?>">
                                    </div> 
                                    <div class="col-sm-9">
                                        <label for="direccion">Direcci&oacute;n:</label>
                                        <input type="text" name="direccion" id="direccion" class="form-control" maxlength="250" required value="<?php echo $row['direccion']; ?>">
                                    </div> 
                                    <div class="col-sm-3">
                                        <label for="telefono">Teléfono:</label>
                                        <input type="text" name="telefono" id="telefono" class="form-control" maxlength="15" required value="<?php echo $row['telefono']; ?>">
                                    </div>  
 
                                                                      
                                </div>

                                <br />
                                <button type="submit" class="btn btn-default">Guardar</button>
                                <a href="<?php echo site_url($controller.'/index'); ?>" class="btn btn-default">Volver</a>
                                <input type="hidden" name="tipo" value="CLIENTE">
                                <input type="hidden" name="activo" value="NO">
                                <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']; ?>">                                
                                
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