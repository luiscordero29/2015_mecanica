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
                            	<legend>Cambiar Contraseña</legend>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="pass">Contraseña</label>
                                        <input type="password" name="pass" id="pass" class="form-control" maxlength="100" required autofocus >
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="veryfi">Confirmar Contraseña</label>
                                        <input type="password" name="veryfi" id="veryfi" class="form-control" maxlength="100" required >
                                    </div>
                                      
                                </div>
                                
                                <br />
                                <button type="submit" class="btn btn-default">Guardar</button>
                                <a href="<?php echo site_url('panel/index'); ?>" class="btn btn-default">Volver</a>
                                <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">
                                

                            <?php 
                                echo form_close(); 
                            ?>
                            </div>
                            </div>
                            
                                                   
                        </div>
                    </div>
        </div> 
    </div>               
        