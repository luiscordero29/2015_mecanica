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
                                <legend>Crear Administrador</legend>                                    
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="usuario">Usuario:</label>
                                        <input type="text" name="usuario" id="usuario" class="form-control" maxlength="15" required autofocus>
                                    </div> 
                                    <div class="col-sm-4">
                                        <label for="identidad">Cedula de Identidad:</label>
                                        <input type="text" name="identidad" id="identidad" class="form-control" maxlength="15" required autofocus>
                                    </div>  
                                    <div class="col-sm-4">
                                        <label for="sexo">Sexo:</label>
                                        <select name="sexo" id="sexo" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="MASCULINO">MASCULINO</option>
                                            <option value="FEMENINO">FEMENINO</option>
                                        </select>
                                    </div>                               
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="apellidos">Apellidos:</label>
                                        <input type="text" name="apellidos" id="apellidos" class="form-control" maxlength="120" required>
                                    </div>                                    
                                    <div class="col-sm-6">
                                        <label for="nombres">Nombres:</label>
                                        <input type="text" name="nombres" id="nombres" class="form-control" maxlength="120" required>
                                    </div>                                    
                                </div>

                                <div class="row">      
                                    <div class="col-sm-12">
                                        <label for="correo">Correo:</label>
                                        <input type="text" name="correo" id="correo" class="form-control" maxlength="250" required>
                                    </div> 
                                    <div class="col-sm-12">
                                        <label for="direccion">Direcci&oacute;n:</label>
                                        <input type="text" name="direccion" id="direccion" class="form-control" maxlength="250" required>
                                    </div> 
                                    <div class="col-sm-6">
                                        <label for="telefono">Teléfono:</label>
                                        <input type="text" name="telefono" id="telefono" class="form-control" maxlength="15" required>
                                    </div> 
                                    <div class="col-sm-6">
                                        <label for="activo">Activo:</label>
                                        <select name="activo" id="activo" class="form-control" required>
                                            <option value="">SELECCIONE...</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>                                   
                                </div>

                                <br />
                                <button type="submit" class="btn btn-default">Guardar</button>
                                <a href="<?php echo site_url($controller.'/index'); ?>" class="btn btn-default">Volver</a>
                                <input type="hidden" name="tipo" value="ADMINISTRADOR">
                                
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