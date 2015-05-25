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
                                <legend>Crear Tipo de Veh&iacute;culo</legend>                                    
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="tipo">Tipo de Veh&iacute;culo:</label>
                                        <input type="text" name="tipo" id="tipo" class="form-control" maxlength="250" required autofocus>
                                    </div>                               
                                </div>

                                <br />
                                <button type="submit" class="btn btn-default">Guardar</button>
                                <a href="<?php echo site_url($controller.'/index'); ?>" class="btn btn-default">Volver</a>
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