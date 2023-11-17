
<script type="text/javascript">
$(document).ready(function() {
        
    $('.deleteid').click(function() {
        var id = $(this).data("id");        
        $('#selectedid').val(id);
    });
    
    $('#confirmdelete').click(function() {
        var id = $('#selectedid').val(); 
        var redirecturl = $('#redirecturl').val();
        window.location = redirecturl+"/"+id+"/destroy";
    });
    
    $('#canceldelete').click(function() {
        $('#selectedid').val(0);
    });

    $('.statusid').click(function() {       
        var id = $(this).data("id");
        $('#selectedid').val(id);
    });

    $('#confirmstatus').click(function() {       
        var id = $('#selectedid').val();       
        var redirecturl = $('#redirecturl').val();       
        window.location = redirecturl+"/"+id+"/updatestatus";
    });
    

    $('#cancelstatus').click(function() {
        $('#selectedid').val(0);
    });
    
      $('#confirmapproval').click(function() {
        var id = $('#selectedid').val(); 
        var redirecturl = $('#redirecturl').val();       
        window.location = redirecturl+"/"+id+"/updateapporval";
    });

 $('#cancelapproval').click(function() {
        $('#selectedid').val(0);
    });

    
    
    
    $('.close').click(function() {
        $('#selectedid').val(0);
    });
});
</script> 