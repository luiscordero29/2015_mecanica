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
                        <div> 
                            
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

                                                   
                        </div>
                    </div>
        </div>
    </div>
    </div>
                
        