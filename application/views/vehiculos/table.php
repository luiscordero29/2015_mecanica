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
      <div class="box">
      <div class="panel panel-default">
      <div class="panel-heading"><h4>GESTOR DE VEH&Iacute;CULOS</h4></div>
      <div class="panel-body">
        
            <div class="row">
              <div class="col-md-6">                                      
              </div>
              <div align="right" class="col-md-6">                                     
                <a href="<?php echo site_url($controller.'/create/'.$row_usuario['id_usuario']); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-file"></i> Nuevo Registro</a>       
              </div>
            </div>
            <br />

            <div class="row">
              <div class="col-sm-12">
                <div class="separador">
                <?php if($table){ ?>
                  <table class="table table-bordered">
                  <thead>
                      <tr>
                        <th>Placa</th> 
                        <th>Año</th> 
                        <th>Tipo</th> 
                        <th>Color</th> 
                        <th>Marca</th> 
                        <th>Modelo</th>                         
                        <th width="1px"></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($table as $r) : ?>
                      <tr>
                        <td><?php echo $r['placa']; ?></td>
                        <td><?php echo $r['periodo']; ?></td>
                        <td><?php echo $r['tipo']; ?></td>
                        <td><?php echo $r['color']; ?></td>
                        <td><?php echo $r['marca']; ?></td>
                        <td><?php echo $r['modelo']; ?></td>
                        <td align="center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Acción <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                              <li><a href="<?php echo site_url('servicios/index/'.$row_usuario['id_usuario'].'/'.$r['id_vehiculo']); ?>"><span class="fa fa-folder"></span> Servicios</a></li>
                              <li class="divider"></li>
                              <li><a href="<?php echo site_url($controller.'/update/'.$row_usuario['id_usuario'].'/'.$r['id_vehiculo']); ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
                              <li><a href="<?php echo site_url($controller.'/delete/'.$row_usuario['id_usuario'].'/'.$r['id_vehiculo']); ?>"><span class="glyphicon glyphicon-remove"></span> Eliminar</a></li>                                 
                          </ul>
                        </div>

                        </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
                  </table>
                <?php } ?>
                </div>
              </div>
            </div>           


      </div>
      </div>
      </div>
    </div>
  </div>
  </div>