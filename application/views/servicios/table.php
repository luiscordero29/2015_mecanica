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
      <div class="col-xs-12">
      <div class="box">
      <div class="panel panel-default">
      <div class="panel-heading"><h4>LISTA DE SERVICIOS</h4></div>
      <div class="panel-body">
        
            <div class="row">
              <div class="col-md-6">                                      
              </div>
              <div align="right" class="col-md-6">                                     
                <a href="<?php echo site_url($controller.'/create/'.$row_usuario['id_usuario'].'/'.$row_vehiculo['id_vehiculo']); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-file"></i> Nuevo Registro</a>       
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
                        <th>Fecha</th> 
                        <th>Costo</th> 
                        <th>Mantenimiento</th> 
                        <th>&Aacute;rea</th> 
                        <th>Descripci&oacute;n</th>                         
                        <th width="1px"></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($table as $r) : ?>
                      <tr>
                        <td><?php echo date("d/m/Y", strtotime($r['fecha'])); ?></td>
                        <td><?php echo $r['costo']; ?></td>
                        <td><?php echo $r['mantenimiento']; ?></td>
                        <td><?php echo $r['area']; ?></td>
                        <td><?php echo $r['descripcion']; ?></td>
                        <td align="center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Acción <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                              <li><a target="_blank" href="<?php echo site_url('pdf/servicio/'.$r['id_servicio']); ?>"><span class="fa fa-print"></span> Imprimir</a></li>
                              <li class="divider"></li>
                              <li><a href="<?php echo site_url($controller.'/update/'.$row_usuario['id_usuario'].'/'.$row_vehiculo['id_vehiculo'].'/'.$r['id_servicio']); ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
                              <li><a href="<?php echo site_url($controller.'/delete/'.$row_usuario['id_usuario'].'/'.$row_vehiculo['id_vehiculo'].'/'.$r['id_servicio']); ?>"><span class="glyphicon glyphicon-remove"></span> Eliminar</a></li>                                 
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