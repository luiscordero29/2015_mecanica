<div class="container">
<div class="row">
  <div class="col-xs-12">
    
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

        <div class="jumbotron">
            <h1>Clinica del Carro</h1>
            <p></p>
        </div>
    
  </div>
  
</div>

</div> <!-- /container -->
    