<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        

        <!-- Collect the nav links, forms, and other content for toggling -->
   
      <ul class="nav navbar-nav navbar-righ">
        <li><a href="<?php echo site_url(''); ?>"><span class="fa fa-home"></span> Sistema</a></li>
      </ul>



        <div id="navbar" class="navbar-collapse collapse">
          
          <?php 
          $at = array('class' => 'navbar-form navbar-right');
          echo form_open('signin',$at); 
          ?>
            <div class="form-group">
              <input type="text" name="user" class="form-control" placeholder="Usuario"  required>
            </div>
            <div class="form-group">
              <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Entrar</button>
          <?php echo form_close(); ?>
        </div><!--/.nav-collapse -->

      </div>
    </nav>