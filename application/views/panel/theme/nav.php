<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('panel/index'); ?>"><i class="fa fa-home"></i> Sistema</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-righ">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administraci&oacute;n<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="dropdown-header">Servicios</li>
            <li><a href="<?php echo site_url('areas/index'); ?>"><span class="fa fa-folder"></span> &Aacute;reas</a></li>
            <li><a href="<?php echo site_url('mantenimientos/index'); ?>"><span class="fa fa-folder"></span> Mantenimientos</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Veh&iacute;culo</li>
            <li><a href="<?php echo site_url('marcas/index'); ?>"><span class="fa fa-folder"></span> Marcas</a></li>
            <li><a href="<?php echo site_url('modelos/index'); ?>"><span class="fa fa-folder"></span> Modelos</a></li>
            <li><a href="<?php echo site_url('colores/index'); ?>"><span class="fa fa-folder"></span> Colores</a></li>
            <li><a href="<?php echo site_url('tipos/index'); ?>"><span class="fa fa-folder"></span> Tipo</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tipos de Usuarios<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url('clientes/index'); ?>"><span class="fa fa-users"></span> Clientes</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo site_url('administradores/index'); ?>"><span class="fa fa-users"></span> Administradores</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">@<?php echo $session['usuario']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url('panel/profile/profile'); ?>"><span class="fa fa-user"></span> Editar Perfil</a></li>
            <li><a href="<?php echo site_url('panel/profile/pass'); ?>"><span class="fa fa-lock"></span> Cambiar Contraseña</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo site_url('panel/logout'); ?>"><span class="fa fa-sign-out"></span> Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>