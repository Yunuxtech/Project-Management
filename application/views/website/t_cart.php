<?php $this->load->view('include/t_header'); ?>

<body id="asdf" class=" catalog-category-view categorypath-women-new-arrivals-html category-new-arrivals store-default" style="overflow-x:hidden;">
<!-- <div id="loading" style="background-color: #fff;top:0px;left:0px;width: 100%;height: 100%;position: fixed;z-index:5000000"><center><img src="<?php echo base_url()?>assets/website_assets/assets/images/01-progress.gif" style=" position:relative; top:50vh;"></center></div> -->




<!-- Modal Search -->




<div id="mainContainer" class="wrapper">

<?php $this->load->view('include/t_header_one'); ?>



        

<section class="content product-cat-sl content--fill content-fill-3d ">

    <table class="table table-striped">
        <tr>
            <th colspan="4" class="text-center"><h4>CART</h4></th>
        </tr>
    	<tr>
    		<th>PRODUCT</th>
    		<th>QUANTITY</th>
    		<th>RATE (1 Piece)</th>
            <th>TOTAL</th>
            <!-- <th>Testing</th> -->
    	</tr>
    	<?php
    			foreach ($cart as $key => $value) {
                    $get_design_ids = explode(",",$value->design_ids);
    				echo"<tr><input type='hidden' class='product_ids' value='".$value->pro_id."'><input type='hidden' class='cart_ids' value='".$value->cart_id."'>";
    				echo"<td><img src='".base_url()."uploads/".get_value('tbl_product','pro_id',$value->pro_id,'pro_img')."' style='width:75px;height:75px;'><br><a href='".base_url()."t_product_edit/".$value->pro_id."/".$value->cart_id."'><i class='fa fa-edit'></i> Edit (".count($get_design_ids)." - Design Selected)</a><br><br><a href='".base_url()."t_product_delete/".$value->cart_id."' class='text-danger text-left'><i class='fa fa-trash'></i> Delete</a></td>";
    				echo"<td class='line_high'><i class='fa fa-minus inc_descrese' title='decrese'></i> <span class='quantity'>".$value->qty."</span> <i class='fa fa-plus inc_descrese' title='increse'></i> </td>";
    				echo"<td class='line_high'>&#8358; : <span class='one_piece'>".$value->pro_price."<span></td>";
                    // echo"<td class='line_high'>INR - <span class='total_piece'>".$value->total_rate*$value->qty."<span></td>";
                    echo"<td class='line_high'>&#8358; : <span class='total_piece'>".$value->pro_price * $value->qty."<span></td>";
    				echo"</tr>";
    			}
    	?>
        
        <?php if(!empty($cart)){ ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
			<?php
			$totolPrice = 0;
			foreach($cart as $key => $value){
				$totolPrice = ($value->pro_price *$value->qty) + $totolPrice;
			}

			?>
            <td>Total &#8358; : <span class="final_total"></span></td>
        </tr>
        <tr>
            <td colspan="4"><a href="<?php echo base_url()."t_order_placed?total=".$totolPrice; ?>" class="btn btn-black submit-btn" style="border-radius: 0px; background-color:#000; border:none;color:#fff;">Order Placed</a></td>
        </tr>
    <?php }else{ ?>
        <tr>
            <td colspan="4" class="text-danger">Cart Item Empty</td>
        </tr>
    <?php } ?>
    </table>


            </div>
          </div>
        </div>

        </section>
<script src="<?php echo base_url()?>assets/website_assets/assets/js/custom.js"></script>

<?php $this->load->view('include/t_footer'); ?>
<style type="text/css">
    table,table tr td,th{text-align: center;}
    .line_high{line-height: 125px!important;}
    .fa-minus,.fa-plus{font-size: 15px;padding: 10px;cursor: pointer;}
    .quantity{border: 1px solid #000;padding: 10px;border-radius: 5px;}
</style>
<script type="text/javascript">
    $(document).ready(function(){
        var total = 0;
        $('.total_piece').each(function(){
            total +=parseFloat($(this).text());
        });
        $('.final_total').text(total);
        $('.inc_descrese').click(function(){
            var get_type = $(this).attr('title');
            var get_qty = $(this).closest('tr').find('td .quantity').text();
            var get_qty_temp = $(this).closest('tr').find('td .quantity').text();
            var one_piece = $(this).closest('tr').find('td .one_piece').text();
			var pro_price = $(this).closest('tr').find('td .total_piece').text();
            var product_id = $(this).closest('tr').find('.product_ids').val();
            var cart_id = $(this).closest('tr').find('.cart_ids').val();
            var customer_id = "<?php echo $this->session->userdata('customer_id'); ?>";
            // console.log(product_id);
            if(get_type == 'increse')
            {
                get_qty++;
				// int(pro_price) = int(pro_price+pro_price);
				

            }
            if(get_type == 'decrese')
            {
                if(get_qty == 1)
                {
                    alert("quantity size need atleast One");
                }
                else
                {
                    get_qty--; 
                }
            }
            if(get_qty_temp == get_qty)
            {

            }
            else
            {
                var $url="<?php echo base_url();?>t_cart_qty_update";
                    
                    $.ajax({ 
                      url: $url,
                      type:"POST",
                      data: {product_id: product_id,qty:get_qty,customer_id:customer_id,cart_id:cart_id,pro_price:pro_price},
                      success: function ($data) {
                        console.log($data);
                        if($data =='insert'){
                          //alert("Product quantity " + get_type);
                        } 
                      },
                      error: function(){
                      }
                    });
                    $(this).closest('tr').find('td .quantity').text(get_qty);
                    $(this).closest('tr').find('td .total_piece').text(one_piece*get_qty);
                    var total = 0;
                    $('.total_piece').each(function(){
                        total +=parseFloat($(this).text());
                    });
                    $('.final_total').text(total);

					var ref = $('.submit-btn').attr("href");

					var arr = ref.split("total=");
					// console.log("FInal ref :: " + arr[0] + total);
					
					$('.submit-btn').attr("href", arr[0] + "total=" + total);
            }

        });
    });
</script>

