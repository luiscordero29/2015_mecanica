  <div class="container">
    <div class="row">                            
      <div class="col-xs-12">
      <div class="box">
      <div class="panel panel-default">
      <div class="panel-heading"><h4>GESTOR DE &Aacute;REA</h4></div>
      <div class="panel-body">
        
            <div class="row">
              <div class="col-md-6">                                      
                <?php 
                $at = array('role'=>'form','class'=>'form-inline');
                echo form_open('',$at); 
                ?>
                  <div class="form-group">
                    <input type="text" name="s" class="form-control" maxlength="120" value="<?php echo $search; ?>">
                    
                  </div> 
                  <div class="form-group">
                  <button type="submit" class="btn btn-default">Buscar</button>
                  <a href="<?php echo site_url($controller.'/index'); ?>" class="btn btn-default"> Limpiar</a>         
                  </div>                                     
                <?php 
                echo form_close(); 
                ?>
              </div>
              <div align="right" class="col-md-6">                                     
                <a href="<?php echo site_url($controller.'/create'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-file"></i> Nuevo Registro</a>       
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
                        <th>&Aacute;rea</th>                           
                        <th width="1px"></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($table as $r) : ?>
                      <tr>
                        <td><?php echo $r['area']; ?></td>
                        <td align="center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Acción <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                              
                              <li><a href="<?php echo site_url($controller.'/update/'.$r['id_area']); ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
                              <li><a href="<?php echo site_url($controller.'/delete/'.$r['id_area']); ?>"><span class="glyphicon glyphicon-remove"></span> Eliminar</a></li>                                 
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

            <div class="row">
              <div class="col-xs-12">                           
                
                <ul class="pagination pagination-sm">

                <?php 
                              
                  $pagination = (int)($table_rows / $table_limit);
                  for ($item=0; $item <= $pagination ; $item++) { 
                                                                
                    if ($item==0) 
                    {
                      if($item == $table_page)
                      {
                        echo "<li class='active'><a href='".site_url($controller.'/index/table_page/'.$item.$search_url)."'>Primera Pág. <span class='sr-only'>(current)</span></a></li>";    
                      }else{
                        echo "<li><a href='".site_url($controller.'/index/table_page/'.$item.$search_url)."'>Primera Pág.</a></li>";  
                      }                                  
                    }
                    elseif($item==$pagination)
                    {
                      if($item == $table_page)
                      {
                        echo "<li class='active'><a href='".site_url($controller.'/index/table_page/'.$item.$search_url)."'>Ultima Pág.</a></li>"; 
                      }
                      else
                      {
                        echo "<li><a href='".site_url($controller.'/index/table_page/'.$item.$search_url)."'>Ultima Pág.</a></li>"; 
                      }
                    }
                    else
                    {
                      if ($item == $table_page) 
                      {
                        echo "<li class='active'><a href='".site_url($controller.'/index/table_page/'.$item.$search_url)."'>".$item."</a></li>";
                      }
                      else
                      {
                        echo "<li><a href='".site_url($controller.'/index/table_page/'.$item.$search_url)."' class='page larger'>".$item."</a></li>";
                      }
                    }
                                
                  }
                ?>
                </ul>

              </div>
            </div>
            


      </div>
      </div>
      </div>
    </div>
  </div>
  </div>