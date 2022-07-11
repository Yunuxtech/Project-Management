<?php $this->load->view('include/t_header'); ?>

<body id="asdf" class=" catalog-category-view categorypath-women-new-arrivals-html category-new-arrivals store-default" style="overflow-x:hidden;">
<!-- <div id="loading" style="background-color: #fff;top:0px;left:0px;width: 100%;height: 100%;position: fixed;z-index:5000000"><center><img src="<?php echo base_url()?>assets/website_assets/assets/images/01-progress.gif" style=" position:relative; top:50vh;"></center></div> -->




<!-- Modal Search -->
<?php $this->load->view('include/t_header_one'); ?>
<?php if(empty($payment)){ 
	redirect(base_url('t_home'));

}else{
	?>

		<div  class="container mycontainer" >
			<form method="post" action="" id="pay">
			
				<h2 class="text-center">Card Details</h2>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="pro_name" class="bmd-label-floating"> Card Number</label>
							<input type="number" class="form-control" required="true" name="pro_name" placeholder="Card Number">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="pro_name" class="bmd-label-floating">MM/YY</label>
							<input type="text" class="form-control" required="true" name="pro_name" placeholder="MM/YY">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="pro_name" class="bmd-label-floating"> CVV</label>
							<input type="password" class="form-control" required="true" name="pro_name" placeholder="CVV">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="submit" class="btn btn-primary btn-block" value="Pay &#8358; <?php  echo $payment;?>">
					</div>
				</div>
			</form>
			
			
		</div>
<?php
}

?>

<style>
.mycontainer{
	width: 30%;
	border:1px solid gray;
	border-radius:5px;
	margin-top:90px;
	padding:30px;
}
.swal-wide{
    width:500px !important;
    height:250px !important;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

$("#pay").submit(function( event ) {
	
	event.preventDefault();
(async () => {

const { value: password } = await Swal.fire({
  title: 'Enter your OTP',
  input: 'password',
  inputLabel: 'OTP',
  inputPlaceholder: 'Enter your OTP',
  inputAttributes: {
    maxlength: 10,
    autocapitalize: 'off',
    autocorrect: 'off'
  }
})

if (password) {
	var $url ="<?php echo base_url();?>payment";
	var $payment = "<?php echo $payment; ?>";


	$.ajax({
		type: "POST", //we are using GET method to get data from server side
		url: $url, // get the route value
		data: {payment:$payment}, //set data
		
		success:function(){

			let timerInterval
				Swal.fire({
				title: 'Payment',
				html: 'Your payment is successful',
				timer: 2000,
				timerProgressBar: true,
				// didOpen: () => {
				// 	Swal.showLoading()
				// 	const b = Swal.getHtmlContainer().querySelector('b')
				// 	timerInterval = setInterval(() => {
				// 	b.textContent = Swal.getTimerLeft()
				// 	}, 100)
				// },
				willClose: () => {
					clearInterval(timerInterval)
				}
				}).then((result) => {
				/* Read more about handling dismissals below */
				if (result.dismiss === Swal.DismissReason.timer) {
					console.log('I was closed by the timer')
					window.location.href="http://localhost/toiler_website/customer_home";
				}
				})
			// alert("payment done");
			// window.location.href="http://localhost/toiler_website/customer_home";
			console.log("<?php echo base_url();?>payment");
		},
		error:function(){
			console.log("Not redirecting to home")
		}
	});
//   Swal.fire(`Entered password: ${password}`)
  
}

})()
});

</script>

</body>
