    <header class="header">



        <div class="header-line hidden-xs tophead" >



            <div class="container">

<div class="col-md-12">



                <div class="pull-right mb1" style="
    text-transform:capitalize;
">

                    <div>
                        <div id="FRAME_MENU" ><!--START: FRAME_MENU-->
                        <div class="h-links-list" >

                            <ul class="mobile1">
                                <!--START: menuitems_view-->

                                                               <!-- <li style="
    padding-right: 8px;
"><a href="#" class="menu" target="#"><b><i class="fa fa-map-marker"></i> </b></a></li> <li class="user-links__item"><b><a  href="welcome/unset_city">Faisalabad</a></b>
                                 </li> -->
                                                               <!-- <li><a href="#" class="menu" target="_self">Product</a></li>-->

                                <!-- <li ><a href="vendor-home" class="menu" target="_self">Sell</a></li>

                                <li><a href="blog" class="menu" target="_self">Blog</a></li> -->




<?php if(!empty($this->session->userdata('customer_id'))){ 
    if($this->session->userdata('role') =='admin')
    {
        $profile='admin_home';
    }
    else
    {
        $profile='customer_home';
    }
    ?>
    <li class="user-links__item"><a href="<?php echo base_url()."".$profile; ?>">Profile</a></li>
<?php }else{ ?>
<li class="user-links__item"><a href="<?php echo base_url()."logout"; ?>"><i class="fa fa-user"></i> Login</a></li>
<li class="user-links__item"><a href="<?php echo base_url()."registration"; ?>"><i class="fa fa-user-plus"></i> Registration</a></li>
<?php } ?>


<?php if(!empty($this->session->userdata('customer_id'))){ ?>
<li class="user-links__item"><a href="#" style="font-weight:600; color:#3373c8;"><?php echo $this->session->userdata('user_name');?></a></li>
<?php } ?>

            <!--  <li class="user-links__item"><a href="login">Wishlist</a></li> -->


                                <!--END: menuitems_view-->
                            </ul>
                        </div>
                        <!--END: FRAME_MENU--></div>
                    </div>

                </div>

</div>
            </div>
        </div>
        <div class="header-line hidden-xs">
            <div class="container no-padding">
                <div class="row" style="padding:0px;">
                <div class="col-md-2 col-sm-3 mb" ><a href=""><img src="<?php echo base_url()?>assets/website_assets/assets/images/tailor.png" class="lima" style="width:90px; height:100px;"></a></div>

                <div class="col-md-6 col-sm-4" align="right">

                <form method="post" action="" style="display: flex; width:95%">

                <input type="text" id="data_search" class="search_id" list="browsers" name="keyword" class="form-control search" placeholder="Search" onfocus="this.placeholder = ''"autocomplete="off" style="padding-left:5px;" required="">
                <span id="data"></span>

<style type="text/css">
    #data2 .row , #data .row{
        padding: 1%;
         padding-left: 2%;
          padding-right: 2%;

    }
    #data2 .row:hover,#data .row:hover{
        background-color: #eee;

    }
     #data_search{
       width: 100%;
       color:#000;
     }
    #data{
        /*position: fixed;
        top:86px;
      //  right:41.1%;
      right:40.3%;
        z-index: 5;
        border:1px solid #ccc;
        background-color: #fff;
        color:#000;
        //width: 452px;
        width:37.2%;
        padding: 1%;
      //  display: none;*/

    }
        #data2{
        /*position: fixed;
        top:86px;
        right:-60px;
        z-index: 5;
        border:1px solid #ccc;
        background-color: #fff;
        color:#444;
        width: 452px;
        padding: 1%;
        display: none;*/

    }
    #data2 .row img, #data .row img{
     /*     width:10%;
      float:left;*/
    }
    .mb
    {
      margin-top: -29px;
    }
    @media screen and (min-width: 501px) and (max-device-width: 999px) {

    .limage
    {
     width: 120%;

    }
    .no-padding{
      padding: 0px;
      margin: 0px;
    }
  }

    .search
    {
      height: 31px;
      border-radius: 0px;
      width: 320px !important;
      display: inline-block;
    }




  }
   .search
    {
      height: 31px;
      border-radius: 0px;
      width: 452px ;
    }

</style>





  <button class="btn btn--wd text-uppercase wave waves-effect" value="Go" style="

    height: 36px;



    padding: 8px;

    width: 65px;

    /* border: none; */

    border-radius: 0px;

"><i class="fa fa-search"></i></button>



                </form>



                </div>

                <div class="col-md-1">



                <div class="header__dropdowns-container">



            <div class="header__dropdowns">



            <div class="header__cart pull-left" >



              <div class="dropdown pull-right sc">

                <a href="<?php echo base_url()."t_cart";?>" class="btn dropdown-toggle btn--links--dropdown header__cart__button header__dropdowns__button" style="color:#000;" ><b style="color:#000;">CART <i class="fa fa-shopping-cart fa-2x"></i><span id="citems" class="badge badge--menu"><?php if($this->session->userdata('role') == 'customer'){ echo get_value_1('tbl_cart','customer_id',$this->session->userdata('customer_id'),'customer_id'); }else{ echo"0";}?></span></a>



                
                                

                                


              </div>

            </div>

</div>

        </div>

                </div>
                

                <div class="col-md-3">&nbsp; &nbsp;<h3 style=" color:#000; font-weight: 600; margin-top: -25px;   text-align: center;" id="call">&nbsp;&nbsp;&nbsp; <i class="fa fa-phone cell"></i> 085250 85119 </h3> </div>

                </div>

            </div>

        </div>
        <nav class="navbar navbar-wd" id="navbar">
            <div class="container no-pdd-lg">

                <div class="navbar-header account">
      <div class="col-xs-2 flo-n"> <button type="button" class="navbar-toggle" id="slide-nav"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button></div>
    <div class="col-xs-7" align="center"><a class="logo" href="<?php echo base_url('t_home'); ?>" style="float:none;">  <img src="<?php echo base_url()?>assets/website_assets/assets/images/logom.png" alt=""/>  </a></div>
                </div>

                <div class="pull-left search-focus-fade no-pdd-lg" id="slidemenu">



                    <div class="slidemenu-close visible-xs"><span class="icon icon-clear"></span></div>

                    <!--START: FRAME_CATEGORY-->

<ul class="nav navbar-nav mobile">
   <li class="account">
   <a href="welcome/unset_city" style="color: #fff;">
    <span class="link-name">
 <i class="fa fa-map-marker ic" style="color: #fff;"></i>

Faisalabad</a> 
</span>
</li>
<li><a href="<?php echo base_url('t_home'); ?>"><span class="link-name"><i class="fa fa-home fa-2x ic"></i> <span class="account"> Home</span>  </span></a></li>

    <?php 
        $datavalues = array('status' => 'YES');
        $get_category = get_data_array('tbl_category',$datavalues);
    foreach($get_category as $key => $value){ ?>
  <li>
    <a href="#" class="dropdown-toggle">
        <span class="link-name">
            <span class="account ic">
                <img src="<?php echo base_url()?>assets/website_assets/img/01-stitching-png-icon.png">
            </span><?php echo $value->category_name; ?> <i class="fa fa-angle-down"></i>
        </span>
    </a>
   </li>

    <li class="al-subcategory">
        <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">
            <?php 
        $datavalues = array('status' => 'YES','cat_id' => $value->cat_id);
        $get_sub_category = get_data_array('tbl_sub_category',$datavalues);
        if(!empty($get_sub_category)){
        foreach($get_sub_category as $key => $value1){ ?>
            <li><a href="sub_cat_v/<?php echo $value1->sub_cat_id; ?>"><?php echo $value1->sub_cat_name; ?> </a></li>
        <?php } } ?>
        </ul>
    <li>
    <?php } ?>
    <li >
        <a href="#about&contact">
            <span class="link-name">About Us</span>
        </a>
    </li>
    <li >
        <a href="#about&contact" >
            <span class="link-name">Contact Us</span>
        </a>
    </li>
    <li >
        <a href="#product" >
            <span class="link-name">Product</span>
        </a>
    </li>
    <li >
        <a href="#faq" >
            <span class="link-name">Faq's</span>
        </a>
    </li>

    <li class="account ">
        <a href="welcome/login">
            <span class="link-name">Login</span>
        </a>
    </li>
    <li class="account ">
        <a href="Welcome/donate">
            <span class="link-name">Donate</span>
        </a>
    </li>
</ul>

                </div>

<div class="col-xs-3">
                <div class="header__dropdowns1">



        <div class="header__search pull-right">



<a href="#" class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button search-open"

><span class="icon icon-search"></span></a> </div>

        <div class="dropdown pull-right sc ab">

                <b style="color:#000;"></b> <a href="#" class="btn dropdown-toggle btn--links--dropdown header__cart__button header__dropdowns__button" data-toggle="dropdown" style="color:#000;"><i class="fa fa-cart-plus fa-2x mcart" ></i><span id="count_cart" class="badge badge--menu mcart" >0</span></a>



                
                                <div class="dropdown-menu animated fadeIn shopping-cart" role="menu" id="mycart2">



      <div class="shopping-cart__top text-uppercase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="shopping-cart__total">

            <i class="fa fa-shopping-bag fa-2x"></i>

            Empty Cart</span></div>



                </div></div>

   <a href="tel:9644409191" class="phonecell" ><div class="pull-right" style="margin-top: 10px;">

                <b style="color:#fff;"></b><a href="tel:9644409191" style="color:#000;"><i class="fa fa-phone fa-2x" style="color:#fff;"></i></a>




              </div></a> 

      </div></div>

            </div>

        </nav>

    </header>


<style>
.mgn{
  margin: 8px !important;
}
.viewall{
  margin-top: 2%;
  /*margin-bottom: -20px;*/
}
}
.imm2{
  height: 250px !important;
}
.work1{
margin-top: 20px;
 margin-bottom: 40px;
}
.work2{
  width: 80%;
}
 .bg-video {
    background: url("http://mobiledarzi.com/assets/images/tailor.jpg") no-repeat 0px 0px;
    background-attachment: fixed;
    background-size: cover;
    padding: 100px 0px;
    text-align: center;
    margin-bottom: 20px;
}
.modal-content.vdo{
    background-color: #505050;
    padding: 0px !important;
  }
  .modal-body.vdo{
    padding: 0px;
  }
  .c-white{
    color: #fff !important;
  }
@media (max-width: 1020px) {
  .bg-video {
     background-attachment:inherit !important;
  }
}
@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
.sizes-example1 {
  width: 150px !important;
  height: 250px !important;

}
.sizes-example111{
   height: 170px !important;
}

.mgn{
  margin: 2px !important;
  height: 65px;
  overflow: hidden;
}
}


@media (max-width: 500px){
  .viewall{
  margin-top: 5%;
  margin-bottom: -20px;
}

  .work1{
 margin-top: 0px !important;
 margin-bottom: 0px !important;

}
.work2{
  width: 90%;
}
.imm2{
  height: 275px !important;
}
.sizes-example1 {
  width: 200px !important;
  height: 300px !important;

}
.sizes-example111 {
  width: 200px !important;
  height: 200px !important;

}
.sizes-example {
  float: none !important;


}


}

.sizes-example111 {
  height: 342px;
}


</style>

<script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:-1,d:1,o:-1},{b:0,d:1000,o:1}],
              [{b:1900,d:2000,x:-379,e:{x:7}}],
              [{b:1900,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,r:288,sX:9,sY:9},{b:1000,d:900,x:-1400,y:-660,o:1,r:-288,sX:-9,sY:-9,e:{r:6}},{b:1900,d:1600,x:-200,o:-1,e:{x:16}}]
            ];

            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 3000,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*responsive code end*/
        };
    </script>
<style>
@media @media (min-width:320px){
.iframe-btn-container {
    padding:40px 0 !important;
}
}
@media only screen and (min-width:321px) and (max-width:768px) {
.iframe-btn-container {
  padding:50px 0 !important;
}
}

body
{
    background-color:rgba(0, 0, 0, 0.09);
}
.image .overlay_img:before {

       width: 0%;
    content: '\2661';
    position: absolute;
    top: -6px;
    right: 25px;
    background-color: initial;
    display: inline-block;
    box-sizing: border-box;
    text-align: center;
    padding: 12px;
    font-size: 30px;

    cursor: pointer;
}

.flash-message{

    position:absolute;
        top: 270px;
    margin-left: 2px;
    width: 100%;
    left:0px;
    color:#000;
}
.sizes-example1 {
    width: 100%;
    height: 340px;

}

.sizes-example {
    float: left;

    margin-left: 1%;
}

.boxSep{
        background-color:#f7f7f7;


        margin-right: 5px;

    }
    .imgLiquid{
        width: auto;
        height: 300px;
    }
    .LogSep{
        margin:10px;
    }
@media(min-width: 786px){
  .wdt-contain{
    width: 1255px;
  }
}
.jssorb05{position:absolute}
.jssorb05 div,.jssorb05 div:hover,.jssorb05 .av
{position:absolute;
width:16px;height:16px;
background:url('img/b05.png') no-repeat;
overflow:hidden;cursor:pointer}
.jssorb05 div
{background-position:-7px -7px}
.jssorb05 div:hover,.jssorb05
.av:hover{background-position:-37px -7px}
.jssorb05 .av{background-position:-67px -7px}
.jssorb05 .dn,.jssorb05
.dn:hover{background-position:-97px -7px}
.jssora22l,.jssora22r{display:block;position:absolute;width:40px;height:58px;cursor:pointer;background:url('<?php echo base_url()?>assets/website_assets/img/a12.png') center center no-repeat;overflow:hidden;background-color: rgba(0, 0, 0, 0.15);
    border-radius: 5px;}
.jssora22l{background-position:-10px -31px}
.jssora22r{background-position:-70px -31px}

.jssora22l.jssora22ldn{background-position:-250px -31px}
.jssora22r.jssora22rdn{background-position:-310px -31px}
.testi
    {
        height:216px ;
    }
@media only screen and (max-width: 500px) {
    .jssora22l,.jssora22r{
        display:block;
    position:absolute;
    width:40px;
    height:58px;cursor:pointer;background:url('img/a12.png') center center no-repeat;
    overflow:hidden;
  background-color: rgba(0, 0, 0, 0.15);
    border-radius: 5px;

    }
    .jssora22l{background-position:-10px -31px}
.jssora22r{background-position:-70px -31px}
    .jssora22l:hover{background-position:-130px -31px}
.jssora22r:hover{background-position:-190px -31px}
.jssora22l.jssora22ldn{background-position:-250px -31px}
.jssora22r.jssora22rdn{background-position:-310px -31px}

.testi
    {
        height:250px; !important;
    }
}
</style>
