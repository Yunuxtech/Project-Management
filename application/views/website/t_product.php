<?php $this->load->view('include/t_header'); ?>

<body id="asdf" class=" catalog-category-view categorypath-women-new-arrivals-html category-new-arrivals store-default" style="overflow-x:hidden;">
<!-- <div id="loading" style="background-color: #fff;top:0px;left:0px;width: 100%;height: 100%;position: fixed;z-index:5000000"><center><img src="<?php echo base_url()?>assets/website_assets/assets/images/01-progress.gif" style=" position:relative; top:50vh;"></center></div> -->




<!-- Modal Search -->




<div id="mainContainer" class="wrapper">


<?php $this->load->view('include/t_header_one'); ?>



        

<section class="content product-cat-sl content--fill content-fill-3d ">

    <div class="container wdt-contain">
        
  <!-- Content section -->
    <style>

	.selected{
      background-color:#3373c8;
      color:#fff;
      padding:2%;
    }
	.selected2{
      background-color:#3373c8;
      color:#fff;
      padding:2%;
	  margin-top: 7px;

    }
    @media(max-width: 410px){
.sizes-example1 {
  width: auto;  !important;
  height: 140px; !important;


}
    	.boxSep{
		height: 250px !important;
}
	}

  @media only screen
and (min-device-width : 414px)
and (max-device-width : 736px)
and (orientation : portrait)
 {
  .boxSep{
    height: 300px !important;

    }

  .sizes-example1 {
  width: auto;  !important;
  height: 170px; !important;


}}
@media only screen and (min-device-width : 768px) and (max-device-width : 1023px) {
.boxSep{
    height: 360px !important;
}
}
	.boxSep{
		background-color:#ffffff;
		margin-right: 5px;
		height: 420px;

	}
	.imgLiquid{
		width: auto;
		height: 300px;
	}
	.LogSep{
		margin:10px;
	}


.sizes-example {
	float: left;

	margin-left: 1%;
}
	@media (min-width:500px){
	.fib
	{
		width:52%;
	}
	}
	.tbsss:hover
	{
		color:#FFF !important;
	}

	</style>
<section class="content">

      <div class="container">
      <input type="hidden" id="totattr" value="11">
        <div class="row product-info-outer">
        <div class="panel panel-default panel-table">
          <div class="panel-body">
            <div class="tr">
              <div class="td col-md-12 text-center">
                <div class="social-links social-links--colorize social-links--dark social-links--large">
                  <h3 style="
    font-weight: 400;
    padding-bottom: 13px;" id="dyna_heading"> You Choose We Stitch  </h3>
 <span id="simple_text">You have to select atleast one from below.</span>              <!--  <section class="breadcrumbs  hidden-xs">
					<div class="container" >
						<ol class="breadcrumb breadcrumb--wd pull-left" style="padding-right:10px;padding-left:10px;">
							<li><a href="#">Home</a></li>
							<li class="active">Stitching</li>

						</ol>
					</div>
				</section>-->

                
                  <div class="tab-content tab-content--wd">
          <div role="tabpanel" class="tab-pane active style-4" id="Tab1" style="box-shadow: none;">

      <script type="text/javascript" src="<?php echo base_url()?>assets/website_assets/adminassets/js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/website_assets/adminassets/css/jquery-confirm.css">
    <script src="<?php echo base_url()?>assets/website_assets/adminassets/js/bundled.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/website_assets/adminassets/js/jquery-confirm.js"></script>
           	 <script>
			 var id = "";
			 function fun(a){
				id=a;

			 }

		var jq = $.noConflict();
		jq(document).ready(function(){
			jq(".nextstep").attr("disabled","disabled");
			jq(".nextstep").attr("display","none");
//jq(".prevstep").attr("display","none");
			jq("div").click(function() {

    				if ( jq(this).hasClass( "mark1" ) ) {
 							jq(".nextstep").removeAttr("disabled");
					}

				});


				//jq(".footer").hide();
			//jq(".header-line").hide();
		jq(".prevstep").attr("disabled","disabled");
		jq(".prevstep").css("display","none");
			
			

				jq(".fabric").click(function(e)
				{
					e.preventDefault();
					<?php if($this->session->userdata('role') == 'customer')
			{ ?>
					var get_id = jq(this).closest("div.product-category").find('.myclass span').text();
					 jq(".myclass_"+ get_id +"").closest('.product-category').removeClass("mark1");
					 jq(this).closest("div.product-category").addClass("mark1");
					 jq(".myclass_"+ get_id +"").closest('.product-category').find(".selected").remove();
					  jq(".myclass_"+ get_id +"").closest('.mark1').append("<div class='selected'>Selected</div>");
					
<?php }else{ ?>
				alert("Please login as customer and continue shopping");
<?php } ?>	
			  });

			 //  jq(".fabric").click(function(e)
				// {
				// 	e.preventDefault();
				// 	jq(".product-category").removeClass("mark1");
				// 	jq(this).closest("div.product-category").addClass("mark1");
				// 	jq(".selected").remove();
		  //     jq(".mark1").append("<div class='selected'>Selected</div>");
			 //  });

		});
		</script>
		<form method="post" <?php if(!empty($cart_data)){ ?>action="<?php echo base_url()."t_product_update1"; ?>"<?php }else{ ?>action="<?php echo base_url()."t_product_update"; ?>" <?php } ?>  enctype="multipart/form-data" id="product_form">
    <div class="row" id="design">
    	<h3 class="text-warning" style="padding-top: 10px;margin-bottom: 20px;padding-bottom:10px;background-color: rgba(0, 0, 0, 0.06);text-align: left;padding-left:10px;"><i class="fa fa-list"></i> <?php echo get_value('tbl_category','cat_id',$product[0]->cat_id,'category_name'); ?> <i class="fa fa-long-arrow-right"></i> <?php echo get_value('tbl_sub_category','sub_cat_id',$product[0]->sub_cat_id,'sub_cat_name'); ?> <i class="fa fa-long-arrow-right"></i>  <?php echo $product[0]->pro_name; ?> <?php if(!empty($cart_data)){ ?><span class="badge badge-danger">Update Your Cart Product</span><?php } ?></h3>
    	<?php 
    	$design_id_cart =array();
    	if(!empty($cart_data)){ 
    			$design_id_cart = explode(",",$cart_data[0]->design_ids);
    		?>
    		<?php } ?>
      <div class="row">
      	<div class="product-preview-wrapper col-md-3 col-sm-4 col-xs-6">
      		<div class="boxSep">
      			<div class="imgLiquidNoFill imgLiquid">
      				<div class="product-category">
      					<a href="#" class="fabric" title="">
      						<img src="<?php echo base_url()."uploads/".$product[0]->pro_img; ?>">
      					</a>
      					<div class="product-category__hover caption">
      						
      					</div>
      					<div class="product-category__info">
      						<div class="product-category__info__ribbon" style="background-color: transparent;color: #000;font-weight: 600;position:relative;bottom: 102px;">
      							<h5 class="product-category__info__ribbon__title"><?php echo $product[0]->pro_name; ?></h5>
      						</div>
      					</div>
      					<div class="selected">Selected</div>
      				</div>
      				</div>
      			</div>
      		</div>
      		<div class=" col-md-9 col-sm-4 col-xs-6">
      		<p style="float: left;font-weight: bold;font-size: 15px;">Product Description : <?php echo $product[0]->pro_details; ?></p>
      		</div>
      		<div class="col-md-9 col-sm-4 col-xs-6">
      		<p style="float: left;font-weight: bold;font-size: 15px;">Product Price: &#8358; <?php echo $product[0]->pro_price; ?></p>
      		</div>
      	</div>

				<!--  -->

				<?php 
				$datavalues = array('cat_id' => $product[0]->cat_id,'sub_cat_id' => $product[0]->sub_cat_id);
        $get_design_ids = get_data_array('tbl_styles',$datavalues);
				$get_design_ids_availabe = explode(",",$product[0]->design_id); 
				if(!empty($get_design_ids))
				{ 
					foreach ($get_design_ids as $key => $value) { ?>
						<h3 class="text-warning" style="padding-top: 10px;margin-bottom: 20px;padding-bottom:10px;background-color: rgba(0, 0, 0, 0.06);"><?php echo $value->style_name; ?></h3>
						<?php 
							$datavalues1 = array('cat_id' => $product[0]->cat_id,'sub_cat_id' => $product[0]->sub_cat_id,'style_id' => $value->style_id);
        $get_styles = get_data_array('tbl_design',$datavalues1);
        if(!empty($get_styles))
        {
        	$rowcount = 0;
        	?><div class="row"><?php
        	foreach ($get_styles as $key => $value1) {
        		if(in_array($value1->design_id,$get_design_ids_availabe))
        		{ $mark1="";
        			if(in_array($value1->design_id,$design_id_cart))
        			{
        				$mark1="mark1";
        			}
        			?>
        		
      	<div class="product-preview-wrapper col-md-3 col-sm-4 col-xs-6">
      		<div class="boxSep">
      			<div class="imgLiquidNoFill imgLiquid">
      				<div class="product-category <?php echo $mark1; ?>">

      					<a href="#" class="fabric" title="">
      						<img src="<?php echo base_url()."uploads/".$value1->design_img; ?>">
      					</a>
      					<div class="product-category__hover caption"></div>
      					<div class="product-category__info">
      						<div class="product-category__info__ribbon" style="background-color: transparent;color: #000;font-weight: 600;position:relative;bottom: 102px;">
      							<h5 class="product-category__info__ribbon__title"><?php echo $value1->design_name."<br>INR - ".$value1->design_rate; ?></h5>
      						</div>
      					</div>
      					<input type="hidden" name="" class="selected_designs" value="<?php echo $value1->design_id; ?>">
						  <!-- adding each product amount -->
      					<input type="hidden" name="pro_price" class="" value="<?php echo $product[0]->pro_price; ?>">
						  <!-- end here -->
      					<input type="hidden" name="" class="selected_designs_rates" value="<?php echo $value1->design_rate; ?>">
      					<div class="myclass" style="display:none;"><span class="myclass_<?php echo $value->style_id; ?>"><?php echo $value->style_id; ?></span></div>
      					<?php if(in_array($value1->design_id,$design_id_cart))
        							{ ?>
        								<div class="selected">Selected</div>
        							<?php } ?>
      				</div>
      					
      				</div>
      			</div>
      		</div>
      	<?php 
			} ?>
      	
					<?php
					}
					 ?></div>
        	<?php }
				}
				}
				?>
		<div class="row">
			<div role="tabpanel" class="tab-pane" id="Tab2" style="min-height:400px;  max-height:400px;border: 1px solid #ccc;">
				<center>You can upload images from your computer, tablet or phone.<br></br>
				<div id="div">
						<img id="blah1" <?php if(!empty($cart_data) && !empty($cart_data[0]->own_design_img)){ ?> src="<?php echo base_url()."uploads/".$cart_data[0]->own_design_img; ?>" <?php }else{ ?>src="<?php echo base_url()."assets/website_assets/img/default_upload.png"?>"<?php } ?> alt="your image" width="50%" />
				</div>
				<span>
					<input type="file" id="imgInp"  class="file1 btn btn-success" name="own_design_img" />
    			<span class="btn btn-success" id="delete">Cancel</span>
    		</span>
    		<br>
    		<p>Acceptable File Format</p><br>
		    <div class="col-md-12">
		      <img class="file-sm" src="<?php echo base_url()?>assets/website_assets/img/jpg.png">
		      <img class="file-sm" src="<?php echo base_url()?>assets/website_assets/img/png.png">
		      <img class="file-sm" src="<?php echo base_url()?>assets/website_assets/img/jpeg.png">
		      <img class="file-sm" src="<?php echo base_url()?>assets/website_assets/img/gif.png">
		    </div>
				<div class="upload_d">
					<label class="lb">Description*</label>
					<textarea rows="3" value="" id="upload_desc" name="cust_desc" style="min-height:50px;border:1px solid #aaa" type="text" class="input--wd input--wd--full" required ><?php if(!empty($cart_data) && !empty($cart_data[0]->cust_desc)){ echo $cart_data[0]->cust_desc; } ?></textarea>
				</div>
</center>
          </div>
          </div>
          <?php
          if(!empty($cart_data) && !empty($cart_data[0]->sizes)){
          	$get_values = explode("=>",$cart_data[0]->sizes);
          }
          ?>
          <div class="row" style="margin-top: 100px;">
          	<div class="col-md-2">
    <label>Length</label>
    <input type="text" name="Length" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[1])){ echo"value='".$get_values[1]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Shoulder</label>
    <input type="text" name="Shoulder" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[3])){ echo"value='".$get_values[3]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Waist Length</label>
    <input type="text" name="Waist_Length" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[5])){ echo"value='".$get_values[5]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Hip Length</label>
    <input type="text" name="Hip_Length" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[7])){ echo"value='".$get_values[7]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Sleeve Length</label>
    <input type="text" name="Sleeve_Length" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[9])){ echo"value='".$get_values[9]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Chest Round</label>
    <input type="text" name="Chest_Round" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[11])){ echo"value='".$get_values[11]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Waist Round</label>
    <input type="text" name="Waist_Round" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[13])){ echo"value='".$get_values[13]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Hip Round</label>
    <input type="text" name="Hip_Round" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[15])){ echo"value='".$get_values[15]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Bicep Round</label>
    <input type="text" name="Bicep_Round" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[17])){ echo"value='".$get_values[17]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Elbow Round</label>
    <input type="text" name="Elbow_Round" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[19])){ echo"value='".$get_values[19]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Wrist Round</label>
    <input type="text" name="Wrist_Round" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[21])){ echo"value='".$get_values[21]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Collar</label>
    <input type="text" name="Collar" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[23])){ echo"value='".$get_values[23]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Armhole</label>
    <input type="text" name="Armhole" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[25])){ echo"value='".$get_values[25]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Bottom</label>
    <input type="text" name="Bottom" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[27])){ echo"value='".$get_values[27]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Bottom Length</label>
    <input type="text" name="Bottom_Length" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[29])){ echo"value='".$get_values[29]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Knee Length</label>
    <input type="text" name="Knee_Length" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[31])){ echo"value='".$get_values[31]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Bottom Waist Round</label>
    <input type="text" name="Bottom_Waist_Round" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[33])){ echo"value='".$get_values[33]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Bottom Hip Round</label>
    <input type="text" name="Bottom_Hip_Round" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[35])){ echo"value='".$get_values[35]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Thigh Round</label>
    <input type="text" name="Thigh_Round" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[37])){ echo"value='".$get_values[37]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Knee Round</label>
    <input type="text" name="Knee_Round" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[39])){ echo"value='".$get_values[39]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Calf Round</label>
    <input type="text" name="Calf_Round" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[41])){ echo"value='".$get_values[41]."'"; } ?>>
</div>
<div class="col-md-2">
    <label>Bottom Hern</label>
    <input type="text" name="Bottom_Hern" class="form-control" <?php if(!empty($cart_data) && !empty($cart_data[0]->sizes) && !empty($get_values[43])){ echo"value='".$get_values[43]."'"; } ?>>
</div>




          </div>
          <br>
          <div class="row">
          	<div class="col-md-12">
          		<p class="text-center text-danger">* The above if not applicable some input please skip it</p>
          	</div>
          </div>
      	<!--  -->
      <br>
      <div class="row">
      	<hr><br>
      	<?php
      	$cart="Add";
          if(!empty($cart_data)){
          	$cart = "Update";
          }
          ?>
      	<div class="col-md-12">
      		<input type="submit" name="" class="save_to_cart btn btn--wd" value="<?php echo $cart; ?> to Cart">
      	</div>
      </div>


    </div>
    <?php
      	
          if(!empty($cart_data)){?>
          	<input type="hidden" name="cart_id_hidden" value="<?php echo $cart_data[0]->cart_id; ?>">
         <?php }
          ?>
    <input type="hidden" name="pro_id_hidden" value="<?php echo $product[0]->pro_id; ?>">
    <input type="hidden" name="design_id_hidden" id="design_id_hidden" >
    <input type="hidden" name="design_rate_hidden" id="design_rate_hidden">
	<input type="hidden" name="pro_price" class="" value="<?php echo $product[0]->pro_price; ?>">

    </form>

            </div>


          </div>

           

          



        </div>






          </div>
          </div>

           

          



        </div>
                  <!--<div class="row">
                   <div class="col-md-4">Choose From Catelogue</div>
                  	<div class="col-md-4">Upload Your Design</div>

                    <div class="col-md-4">Design Yourself</div>
                  </div>-->



                    </div>


                       

                    </div>
                </div>
              </div>


            </div>
          </div>
        </div>

        </section>

<?php //$this->load->view('include/t_footer'); ?>
<style type="text/css">
	.tab-content--wd > .tab-pane {
    background-color: #ffffff;
    border-color: #ffffff!important;
    border-top: 0px;
    padding: 8px !important;
}
.boxSep {
    height: 330px!important;

}
.imgLiquid{border-radius: 1px solid #ccc;}
.product-category img {
    width: 100%;
    border-radius: 0;
    height: 250px!important;
}
</style>
<!-- <script src="<?php //echo base_url()?>assets/website_assets/assets/js/custom.js"></script> -->
<script type="text/javascript">
	$(document).ready(function(){
		//alert('<?php //echo $this->session->userdata('role'); ?>');
		$('.save_to_cart').click(function(){
			event.preventDefault();
			<?php if($this->session->userdata('role') == 'customer')
			{ ?>
				
				var myarray = [];
				var rate = [];
				$('.mark1').each(function()
				{
					myarray.push($(this).find('.selected_designs').val());
					rate.push($(this).find('.selected_designs_rates').val());
				});
				sum = 0;
				$.each(rate,function(){sum+=parseFloat(this) || 0;});
				$('#design_id_hidden').val(myarray.join(','));
				$('#design_rate_hidden').val(sum);
				$("#product_form").submit();
<?php }else{ ?>
				alert("Please login as customer and continue shopping");
<?php } ?>
			
		});
		// 
		
         function readURL(input) {
			    if (input.files && input.files[0]) {
			        var reader = new FileReader();

			        reader.onload = function (e) {
			            $('#blah1').attr('src', e.target.result);
			        }

			        reader.readAsDataURL(input.files[0]);
			    	}
					}

		$("#imgInp").change(function(){
		    readURL(this);
		});
		
		$('#delete').click(function () {
   								//alert('kkk');
                    jq('#dragyour').hide();
                 jq('#or').html('');

				jq("#imgInp").attr('src',"");
				jq("#blah1").attr('src',"<?php echo base_url()."assets/website_assets/img/default_upload.png"?>");
				jq("#blah").attr('src',"<?php echo base_url()."assets/website_assets/img/default_upload.png"?>");
				jq("#upfile1 figcaption").html('Upload Your Design');
				jq("#upfile1 img").removeClass("delete");
   				});


			jq("#upload_design").click(function () {
				jq("#simple_text").hide();
			});

			jq("#pre_design").click(function () {
				jq("#simple_text").hide();
				jq(".prevstep").attr("disabled","disabled");
			});
	});
</script>
<style type="text/css">
	.col-md-2 input[type="text"]{
    margin-bottom: 10px;
}
</style>
