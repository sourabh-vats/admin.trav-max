
	

	
	  <!--link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script-->
    

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://code.jquery.com/resources/demos/style.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

  <script>
  
$(document).ready(function() {
    $('#example').DataTable();
	$( "#datepicker" ).datepicker();
	$( "#datepicker1" ).datepicker();
	$( "#datepicker2" ).datepicker();
	$( "#datepicker3" ).datepicker();
} );
 
  </script>
  <script>
    $(function() {
        // Initialize the datepicker
        $('.datepicker').datepicker({
            dateFormat: 'dd-mm-yy', // Format of the selected date
            // Other options as needed
        });
    });
</script>

<!--<script src="<?php echo base_url(); ?>assets/js/lsb.min.js"></script>
<script>
	jQuery(window).load(function() {
		  jQuery.fn.lightspeedBox();
		});
	</script> -->
</body>
</html>