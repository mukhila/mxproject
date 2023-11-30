<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

<!-- endbuild -->

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>


<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
<script src="{{ asset('assets/js/dashboards-crm.js') }}"></script>
<!-- Vendors JS -->

<!-- Page JS -->
<script src="{{ asset('assets/js/form-layouts.js') }}"></script>
<script src="{{ asset('assets/js/app-chat.js') }}"></script>



<!-- Select -->
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('assets/js/forms-selects.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

<!-- Custom data table -->
<script>
    $(function () {
        console.log('data table loaded')
      $(".own_data_table").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
</script>

<script type="text/javascript">
  
        
         
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   



   $("#denomination_id").change(function(e) {
  
        e.preventDefault();   
        var denomination_id = $(this).val();
      
        $.ajax({
           type:'POST',
           url:"{{ route('tenantdenomination.ajaxRequest') }}",
           dataType: 'json',
           data:{denomination_id:denomination_id},
           success:function(response){               
                 $("#currencyvalue").val(response.denomination.value); 
                 $("#currencytype").val(response.denomination.currency_type); 
                 /*$("#currency").val(response.denomination.currency_name);
                 $("#currency_id").val(response.denomination.currency_id);
                 alert(response.denomination.currency_id);*/
               }
          
        });
           
     });



   $("#currency_id").change(function(e) {
  
        e.preventDefault();   
        var currency_id = $(this).val();
      
        $.ajax({
           type:'POST',
           url:"{{ route('tenantdenomination.ajaxRequestForDenomination') }}",
           dataType: 'json',
           data:{currency_id:currency_id},
           success:function(response){               
              
              $("#denomination_id").empty(); 
                
              var len = 0;
             if(response['denomination'] != null){
               len = response['denomination'].length;
               var option = "<option value = '0'> Select Denomination</option>"; 
               $("#denomination_id").append(option); 
             }else
             {
                 var option = "<option value = '0'>No Denomination</option>"; 
                $("#denomination_id").append(option); 
             }
            
             if(len > 0){
               // Read data and create <option >
               for(var i=0; i<len; i++){
                 
                 var name = response['denomination'][i]['denomination_code'];

                 var id = response['denomination'][i]['id'];

                 var option = "<option value='"+id+"'>"+name+"</option>"; 

                
                 $("#denomination_id").append(option); 
               }
             }
             else                
                 {
                     $("#denomination_id").empty(); 
                     var option = "<option value = '0'>No Denomination</option>"; 
                     $("#denomination_id").append(option); 
                 }
               
         }        
          
        });
           
     });


   
    </script>