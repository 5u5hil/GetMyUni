
<script src="<?php echo ADMIN_SCRIPTS ;?>jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo ADMIN_SCRIPTS ;?>bootstrap.min.js"></script>
<script src="<?php echo ADMIN_SCRIPTS ;?>modernizr.min.js"></script>
<script src="<?php echo ADMIN_SCRIPTS ;?>jquery.sparkline.min.js"></script>
<script src="<?php echo ADMIN_SCRIPTS ;?>toggles.min.js"></script>
<script src="<?php echo ADMIN_SCRIPTS ;?>retina.min.js"></script>
<script src="<?php echo ADMIN_SCRIPTS ;?>jquery.cookies.js"></script>

<script src="<?php echo ADMIN_SCRIPTS ;?>bootstrap-fileupload.min.js"></script>
<script src="<?php echo ADMIN_SCRIPTS ;?>jquery.datatables.min.js"></script>
<script src="<?php echo ADMIN_SCRIPTS ;?>chosen.jquery.min.js"></script>

<script src="<?php echo ADMIN_SCRIPTS ;?>custom.js"></script>
<script>
  $(document).ready(function() {
    $('#table1').dataTable();
    
    $('#table2').dataTable({
      "sPaginationType": "full_numbers"
    });
    
    // Chosen Select
   /* $("select").chosen({
      'min-width': '100px',
      'white-space': 'nowrap',
      disable_search_threshold: 10
    });*/
    
    // Delete row in a table
    $('.delete-row').click(function(){
      var c = confirm("Continue delete?");
      if(c)
        jQuery(this).closest('tr').fadeOut(function(){
          jQuery(this).remove();
        });
        
        return false;
    });
    
    // Show aciton upon row hover
    $('.table-hidaction tbody tr').hover(function(){
      $(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      $(this).find('.table-action-hide a').animate({opacity: 0});
    });
  
  
  });
</script>

</body>
</html>
