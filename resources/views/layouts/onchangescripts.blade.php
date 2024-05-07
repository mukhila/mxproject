<script type="text/javascript">
$(document).ready(function() {




   $("#tenantcurrency_id").change(function(e) {
  
        e.preventDefault();   
        var currency_id = $(this).val();
         $.ajax({
           type:'POST',
           url:"{{ route('companyusers.exchange.ajaxRequest') }}",
           dataType: 'json',
           data:{currency_id:currency_id},
           success:function(response){   
                     $("#ratetable").show(); 
                      $("#addrows").html('');
                     var len = response.denomination.length;                     
                     for(i=0;i<len;i++){ 

                     $("#addrows").append('<tr> <td> <div class="form-floating form-floating-outline mb-4"><input type="text" id="denomination_code'+[i]+'" class="form-control" name = "denomination_code[]"value = "'+response.denomination[i].denomination_code+'" required/> <input type="hidden" name ="tenant_denomination_id[]" value="'+response.denomination[i].tenant_denomination_id+'" /></div> </td> <td> <div class="form-floating form-floating-outline mb-4"> <input type="text" id="currencyvalue'+[i]+'" class="form-control" value = "'+response.denomination[i].value+'" disabled/></div> </td> <td> <div class="form-floating form-floating-outline mb-4"> <input type="text" id="currencytype'+[i]+'" class="form-control" value = "'+response.denomination[i].currency_type+'" disabled/> </div></td><td> <div class="form-floating form-floating-outline mb-4"> <input type="text" id="market_rate'+[i]+'" class="form-control market_rate" name = "market_rate[]" value = "" required /></div></td><td><div class="form-floating form-floating-outline mb-4"> <input type="text" id="buy_rate'+[i]+'" class="form-control buy_rate" name="buy_rate[]" value = "" required /></div> </td> <td> <div class="form-floating form-floating-outline mb-4"> <input type="text" id="sell_rate'+[i]+'" class="form-control sell_rate" name = "sell_rate[]" value = "" required /></div> </td></tr>');
                    }
                    }
              });
    });

   
   $("#allmarket_rate").keyup(function(e) {
        var allmarket_rate = $(this).val();
        $(".market_rate").val(allmarket_rate);
   });



   $("#allbuy_rate").keyup(function(e) {
        var allbuy_rate = $(this).val();
        $(".buy_rate").val(allbuy_rate);
   });



   $("#allsell_rate").keyup(function(e) {
        var allsell_rate = $(this).val();
        $(".sell_rate").val(allsell_rate);
   });




	});
</script> 