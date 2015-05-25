    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>

     <script src="<?php echo base_url(); ?>assets/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/datepicker/locales/bootstrap-datepicker.es.min.js"></script>

    <script>

		$(function(){
			$('#datepicker').datepicker({
				format: 'dd/mm/yyyy',
                language: 'es'
			});            
		}); 

	</script>

    <script>
        
        function ajax_vehiculos_table_modelos(){
            var id = $('select#id_marca').val();
            $.ajax({
                type:'POST',
                url: '<?php echo site_url('vehiculos/table_modelos'); ?>',
                data: 'id_marca='+id,
                success: 
                    function(resp){
                        $('select#id_modelo').html(resp);        
                    }
            });
        }      
              
    </script>


  </body>
</html>
