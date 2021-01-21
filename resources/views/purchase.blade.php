@extends('layouts.admin.base')
        
@section('content')


<div class="content-wrapper">
    
        
    <h3>Purchase Products</h3>
                
    <div class="box-body">
        <div class="row">
          <div class="col-12" style="position: relative;">
             <form action="#" method="POST">
                 @csrf
                 <div class="card" style="min-height: 500px;">
                    
                     <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group" style="position: relative;">
                                            <select type="text" name="supplier_id" id="supplier_name" class="form-control" >
                                                  <option value="">--Select Supplier--</option>
                                              @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group"  style="position: relative;">
                                            <input type="text" name="supplier_memo" id="supplier_memo" class="form-control" placeholder="Memo No" style="height:35px;">
                                            <div id="memo_div" style="width: 100%; display: none; position: absolute; top: 30px; left: 0; z-index: 999;"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                        <div class="col-12">
                                            <div class="form-group" style="position: relative;">
                                              <select type="text" name="pid_hid" id="pid_hid" class="form-control" >
                                                    <option value="">--Select Product--</option>
                                                @foreach($products as $product)
                                                  <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                        </div>
                                </div>
                                
                                <div class="row" style="height:350px; overflow-y: auto; ">
                                    <div class="col-12" style=" padding-right: 0 !important;">
                                        <table class="price-table custom-table" style="">
                                            <tr><th>SL</th><th style="width: 100px;">Item</th><th>price</th><th>Qty</th><th>Total</th><th>Delete</th></tr>
                                            
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                
                                <div class="row">
                                    <div class="col-4">
                                      <div class="form-group">
                                        <input type="text" name="price" id="price" class="form-control" placeholder ="Price" style="height:35px;">
                                        
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-group">
                                        <input type="text" name="qnt" id="qnt" class="form-control" placeholder ="Quantity" style="height:35px;">
                                        
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-group">
                                        <input type="text" name="date" id="date" class="form-control" placeholder ="date" value="<?php echo date("Y-m-d");?>" style="padding: 0.94rem 0.5rem;height:35px;">
                                        
                                      </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                      <div class="form-group">
                                         <label>Amount</label>
                                         <input type="text" name="amount" id="amount" class="form-control" placeholder ="" style="height:35px;">
                                        
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                         <label>Discount</label>
                                         <input type="text" name="discount" id="discount" class="form-control" placeholder ="" style="height:35px;">
                                        
                                      </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                      <div class="form-group">
                                         <label>Payment</label>
                                         <input type="text" name="payment" id="payment" class="form-control" placeholder ="" style="height:35px;">
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                         <label>Total</label>
                                         <input type="text" name="total" id="total" class="form-control" placeholder ="" style="height:35px;">
                                         <input type="hidden" name="hid_total" id="hid_total" class="form-control" placeholder ="">
                                         
                                      </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div style="width: 120px; margin: 50px auto;">
                                            <input type="button" class="btn btn-success" id="pur_save" value="Save">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                 
              </form> 
        
                 
          </div>
        </div>
    </div>
</div>
@endsection

@push('js')

<script type="text/javascript">

    $(document).ready(function(){
        $('#supplier_name').select2();
        $('#pid_hid').select2();
        
       // $('#date').datepicker({dateFormat: 'yy-mm-dd'});
        
        $("#discount").on("change keyup paste", function(){
                
            var amount = Number($('#amount').val());
                    
            var discount = Number($(this).val());
                    
            $('#total').val(amount - discount); 
                    
        });
        
        $("#payment").on("change keyup paste", function(){
                
            var amount = Number($('#amount').val());
                    
            var payment = Number($(this).val());
            
            var discount = Number($('#discount').val());
                    
            $('#total').val(amount - payment - discount); 
                    
        });
        
        
        $("#supplier_memo").keyup(function(e){
                    
            if(e.which == 40 || e.which == 38){
            
            $("#supplier_memo").blur();
                        
            $('.suppmemo-list').find("li:first").focus().addClass('active').siblings().removeClass();
                        
            $('.suppmemo-list').on('focus', 'li', function() {
                $this = $(this);
                $this.addClass('active').siblings().removeClass();
                $this.closest('.suppmemo-list').scrollTop($this.index() * $this.outerHeight());
            });
                                
            $('.suppmemo-list').on('keydown', 'li', function(e) {
                                
                $this = $(this);
                if (e.keyCode == 40) {   
                                        
                    $this.next().focus();
                                        
                        return false;
                    }else if (e.keyCode == 38) {        
                        $this.prev().focus();
                        return false;
                    }
                }); 
                                
                $('.suppmemo-list').on('keyup', function(e){
                    if(e.which == 13){
                        
                                    
                    }
                });
                        
                return false;
            }
                    
                var s_text = $(this).val();
        			
        		var formData = new FormData();
        			formData.append('s_text', s_text);
        			
        			$.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
        			
            	$.ajax({
            		  url: "{{ URL::route('get_suppmemo') }}",
                      method: 'post',
                      data: formData,
                      contentType: false,
                      cache: false,
                      processData: false,
                      dataType: "json",
            		  beforeSend: function(){
                			//$("#wait").show();
                		},
            		  error: function(ts) {
                          //alert(ts.responseText);
                          $('#memo_div').show();
                          $('#memo_div').html(ts.responseText);
                          
                      },
                      success: function(data){
                        
                          $('#memo_div').show();
                          $('#memo_div').html(ts.responseText);
                          //alert(data);
                          
                      }
            		   
            	}); 
                   
            });
            
            
        
        $('#qnt').on('keyup', function(e){
            
            e.preventDefault();
            
            if(e.which == 13){
                
                
                var id = $('#pid_hid').val();
                var name = $('#pid_hid option:selected').text();
                var sup_id = $('#supplier_name option:selected').val();
                var memo = $('#supplier_memo').val();
                var qnt = Number($(this).val());
                var price = Number($('#price').val());
                
                if(sup_id == '' || id == '' || qnt == '' || price == '' || memo == ''){
                    
                    alert("Please Fillup All Fields ");
                    return false;
                }
                
                totalPrice = (qnt * price); 
                
                add_product_to_table(id, name, qnt, price, totalPrice);
                
                $('#search').focus();
            }
            
        });
        
        
        

        
        //////Place Order///////////
        
        
        $('#pur_save').click(function(e){
      
            var i = 0;
            
            var cartData = [];
    
            //$(this).attr('disabled', true);
            
            $('.price-table tr td').each(function(){
               
               var take_data = $(this).html();
              
               if($(this).attr('data-prodid') != ''){prodid = $(this).attr('data-prodid'); cartData.push(prodid);}
               else if($(this).attr('data-prodid') == ''){cartData.push("0");}
             
               if($(this).attr('class') == 'name'){name = $(this).html();  cartData.push(name);}
               
               if($(this).attr('class') == 'qnt'){qnt = $(this).html();  cartData.push(qnt);}
             
               if($(this).attr("class") == 'price'){price = $(this).html(); cartData.push(price);}
              
               if($(this).attr("class") == 'totalPriceTd'){totalPriceTd = $(this).html(); cartData.push(totalPriceTd);} 
               
               i = i +1;
           });
           
           cartData = cartData.filter(item => item);
           
            
           if(i<5){
               alert("Please Make A List.");
               return false;
           }
           
            var fieldValues = {};
            
            
            fieldValues.supplier_name = $('#supplier_name').val();
            fieldValues.supplier_id = $('#supplier_id').val();
            fieldValues.supplier_memo = $('#supplier_memo').val();
            fieldValues.date = $('#date').val();
            fieldValues.amount = $('#amount').val();
            fieldValues.discount = $('#discount').val();
            fieldValues.payment = $('#payment').val();
            fieldValues.total = $('#total').val();
            
            
           
            var formData = new FormData();
           
            formData.append('fieldValues', JSON.stringify(fieldValues)); 
            formData.append('cartData', JSON.stringify(cartData)); 
                
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          
          $.ajax({
                url: "{{ URL::route('save_purchase_products') }}",
                method: 'post',
                data: formData,
                //data: cartData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                beforeSend: function(){
                    $("#wait").show();
                },
                error: function(ts) {
                    
                    //alert(ts.responseText);
                    
                    if(ts.responseText == '')  {
    
                        //alert(ts.responseText);
                        
                        $('#supplier_name').val("");
                        $('#supplier_id').val("0");
                        $('#amount').val("0");
                        $('#discount').val("0");
                        $('#total').val("0");
                        $('#payment').val("0");
                       
                        $('#hid_total').val("0");
                        
                        $('.price-table td').remove();
                        
                        $('#pur_save').attr('disabled', false); 
                        
                        $("#wait").hide();
                    
                    }else{
                        //alert(ts.responseText);
                        
                        $('#supplier_name').val("");
                        $('#supplier_id').val("0");
                        $('#supplier_memo').val("");
                        $('#amount').val("0");
                        $('#discount').val("0");
                        $('#total').val("0");
                        $('#payment').val("0");
                       
                        $('#hid_total').val("0");
                        
                        $('.price-table td').remove();
                        
                        $('#pur_save').attr('disabled', false);
                        
                        $("#wait").hide();
                    }
            
                },
                success: function(data){    
                        alert("Product Purchase Has Been Completed.!!!");
                        location.reload(true);
                    }
                }); 
          
              e.preventDefault(); 
       }); 
        
        
      
         $('body').on('click', '.delete', function(e){
            
            var totalPriceTd = Number($(this).closest('tr').find('.totalPriceTd').html());
            
            var grandTotal = Number($('#total').val());
        
            var totalPrice = $('#hid_total').val();
            
            
            totalPrice = Number(totalPrice - totalPriceTd);
            
            grandTotalPrice = Number(grandTotal - totalPriceTd);
            
            $('#hid_total').val(totalPrice);
            
            $('#total').val(grandTotalPrice);
            
            $(this).closest('tr').remove();
            
        }); 
        
        $('#discount').on('blur', function(e){
            
            var total = Number($('#hid_total').val());
    
            var discount = Number($(this).val());
            
            var total = Number(total - discount);
            
            $('#total').val(total);
            
        });
        
        
        $('#payment').on('blur', function(e){
            
            var total = Number($('#hid_total').val());
            
            var discount = Number($('#discount').val());
    
            var payment = Number($(this).val());
            
            var total = Number((total - payment) - discount);
            
            $('#total').val(total);
            
        });
        
        
        
      
    });
    
    function selectProducts(id, name, price){

        $('#search').val(name);
        $('#pid_hid').val(id);
        $('#price').val(price);
                                    
        $("#price").focus();
        $("#products_div").hide();
        
    }
    
    function selectSupplier(name, id){
                                   
        $('#supplier_name').val(name);
        $('#supplier_id').val(id);
                                    
        $("#supplier_name").focus();
        $("#supp_div").hide(); 
    }
    
    var sl = 1;
    
    function add_product_to_table(id, name, qnt, price, total){
        
            var id = id;
            var name = name;
            var price = Number(price);
            var total = Number(total);
        
            
            $('.price-table').show();
            
            $('.price-table').append("<tr><td>"+sl+"</td><td data-prodid='"+id+"' style='width:200px;' class='name'>"+name+"</td><td class='price'>"+price+"</td><td class='qnt'>"+qnt+"</td><td class='totalPriceTd'>"+total+"</td><td><i class='delete mdi mdi-delete'></i></td></tr>");
            
            var totalPrice = Number($('#hid_total').val());
            
            totalPrice = Number(totalPrice + total);
        
            $('#hid_total').val(totalPrice);
            
            $('#amount').val(totalPrice);
            
            $('#total').val(totalPrice);
            
            $('#pid_hid').val("0");
            $('#search').val("");
            $('#price').val("");
            $('#qnt').val("");
            
            sl =sl + 1;
    }
    
</script>

@endpush

<style>
    
        .custom-modal{
            position: fixed; 
            left: 0; 
            top: 50px; 
            width: 100%; 
            height: 100%; 
            background-color: #e6e6e6; 
            z-index:999; 
            display: none;
        }
        
        #printRest{
            width: 330px;
        }
        
        #printRest tr td{
            font-size: 12px;
            border: 1px solid #000;
        }
        
        .sugg-list {
            width: 100%;
            background-color: #e6e6e6;
            padding: 0;
        }
        
        .sugg-list li{
            width: 100%;
            border-bottom: #FFF;
            color: #6a6a6a;
            list-style-type: none;
            padding: 5px;
        }
        
        .sugg-list li:hover{
            width: 100%;
            background-color: #006fd2;
            color: #FFF;
            padding: 0;
        }
    
        .custom-table{

            width: 100%;
            border-collapse: collapse;
        }
        
        .custom-table tr th{
            background-color: #1bcfb4;
            color: #FFF;
            text-align: center;
            padding: 5px;
        }
        
        .custom-table tr td{
            padding: 5px;
            border: 1px solid #e6e6e6;
            text-align: center;
            font-size: 14px;
        }
        
        .custom-text{
            
            width: 150px;
            border: 1px solid #e6e6e6;
            border-radius: 2px;
            outline: none;
            padding: 5px;
            box-sizing: border-box;
            text-align: center;
        }
        
        .custom-text:focus{
            border-color: dodgerBlue;
        }

        .card .card-body {
            padding: 0.5rem 0.5rem !important;
        }
        
        .content-wrapper {
            
            padding: 0.25rem 0.25rem !important;
        }
    
        .box-body {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            padding: 10px;
            background-color: #FFF;
        }
        
        .box.box-success {
            border-top-color: #6da252;
        }
        
        .input-group .input-group-addon {
            border-radius: 0;
            border-color: #d2d6de;
            background-color: #fff;
        }
        .input-group-addon:first-child {
            border-right: 0;
                border-right-color: currentcolor;
        }
        .input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child > .btn, .input-group-btn:first-child > .btn-group > .btn, .input-group-btn:first-child > .dropdown-toggle, .input-group-btn:last-child > .btn-group:not(:last-child) > .btn, .input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .input-group-addon {
            min-width: 41px;
        }
        .input-group-addon {
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1;
            color: #555;
            text-align: center;
            background-color: #eee;
            border: 1px solid #ccc;
            border-top-color: rgb(204, 204, 204);
            border-right-color: rgb(204, 204, 204);
            border-right-style: solid;
            border-right-width: 1px;
            border-bottom-color: rgb(204, 204, 204);
            border-left-color: rgb(204, 204, 204);
            border-radius: 4px;
        }
        .input-group-addon, .input-group-btn {
            width: 1%;
            white-space: nowrap;
            vertical-align: middle;
        }
        .input-group .form-control, .input-group-addon, .input-group-btn {
            display: table-cell;
        }
        
        .select2-hidden-accessible {
            border: 0 !important;
            clip: rect(0 0 0 0) !important;
            height: 1px !important;
            margin: -1px !important;
            overflow: hidden !important;
            padding: 0 !important;
            position: absolute !important;
            width: 1px !important;
        }
        
        .input-group-btn > .btn {
            position: relative;
        }
        
        .btn-icon {
            height: 34px;
        }
        
        .form-group .select2-container {
            width: 100% !important;
        }
        
        .select2-container {
            box-sizing: border-box;
            display: inline-block;
            margin: 0;
            position: relative;
            vertical-align: middle;
        }
        
        .form-group .select2-container .select2-selection--single {
            height: 34px;
            border: 1px solid #d2d6de;
        }
        .form-group .select2-container--default .select2-selection--single {
            border-radius: 0px;
        }
        
        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 28px;
            user-select: none;
            -webkit-user-select: none;
        }
        .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
            border: 1px solid #d2d6de;
            border-radius: 0;
            padding: 6px 12px;
            height: 34px;
        }
        
        .form-group .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 30px;
        }
        
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 20px;
        }
        
        .form-group .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #555 transparent transparent transparent;
        }
        
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #888 transparent transparent transparent;
            border-style: solid;
            border-width: 5px 4px 0 4px;
            height: 0;
            left: 50%;
            margin-left: -4px;
            margin-top: -2px;
            position: absolute;
            top: 50%;
            width: 0;
        }
        
        .active{
            color: #FF0;
            background-color: #FFF;
        }
        
        #tblTotal tr td{
            border-top: 0;
        }
           
        .fancy-file {
            display: block;
            position: relative;
        }
        
        .fancy-file div {
            position: absolute;
            top: -1px;
            left: 0px;
            z-index: 1;
            height: 36px;
        }
        
        .fancy-file input[type="text"], .fancy-file button, .fancy-file .btn {
            display: inline-block;
            margin-bottom: 0;
            vertical-align: middle;
        }
        
    }

</style>
