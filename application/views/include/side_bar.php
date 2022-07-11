
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/admin_assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/admin_assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Taiolor Shop
  </title>
  
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url()?>assets/admin_assets/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url()?>assets/admin_assets/demo/demo.css" rel="stylesheet" />
  <!-- Google Tag Manager -->
  
  <!-- End Google Tag Manager -->
</head>

<body class="">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper ">
    <?php $background='sidebar-1.jpg';$colour='black';$dataclr='green';
            if(!empty($this->session->userdata('customer_id')) && $this->session->userdata('role') == 'customer'){
              $background='sidebar-2.jpg';$colour='white';$dataclr='green';
            }
            elseif($this->session->userdata('role') == 'admin') 
            {
              $background='sidebar-1.jpg';$colour='black';$dataclr='rose';
            }
            ?>
    <div class="sidebar" data-color="<?php echo $dataclr;?>" data-background-color="<?php echo $colour;?>" data-image="<?php echo base_url()?>assets/admin_assets/img/<?php echo $background;?>">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <?php 
          $a="";$dashboard_link = "";
          if($this->session->userdata('role') =='admin'){ $a="";$dashboard_link = "admin_home"; }
          if($this->session->userdata('role') =='customer'){$dashboard_link = "customer_home"; }
          ?>
      <div class="logo"><a href="<?php echo base_url().$dashboard_link;?>" class="simple-text logo-mini">
          TS
        </a>
        <a href="<?php echo base_url().$dashboard_link;?>" class="simple-text logo-normal">
          Tailor Shop
        </a></div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="<?php echo base_url()?>uploads/<?php echo get_value('tbl_login','customer_id',$this->session->userdata('customer_id'),'photo'); ?>" />
            
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username" >
              <span>
                <?php echo $this->session->userdata('user_name'); ?>
                <b class="caret"></b>
              </span>
            </a>
            <?php 
            $show_pro = '';
              if($this->uri->segment('1') == 'profile')
                { 
                  $show_pro="show";
                }
            ?>
            <div class="collapse <?php echo $show_pro; ?>" id="collapseExample">
              <ul class="nav">
                <?php 
                  $profile_link = 'profile';
                ?>
                <li class="nav-item <?php if($this->uri->segment('1') == $profile_link){ echo"active";} ?>">
                  <a class="nav-link" href="<?php echo base_url().$profile_link; ?>">
                    <span class="sidebar-mini"> MP </span>
                    <span class="sidebar-normal"> My Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url()."logout"; ?>">
                    <span class="sidebar-mini"> L </span>
                    <span class="sidebar-normal"> LogOut </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <?php if($this->session->userdata('role') =='customer'){ ?>
          <li class="nav-item <?php if($this->uri->segment('1') == $dashboard_link){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url().$dashboard_link;?>">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
        <?php } ?>
          <?php if($this->session->userdata('role') =='admin'){ ?>
          <li class="nav-item <?php if($this->uri->segment('1') == $dashboard_link){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url().$dashboard_link;?>">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'cat'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>cat">
              <i class="material-icons">widgets</i>
              <p> Category </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'sub_cat'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>sub_cat">
              <i class="material-icons">apps</i>
              <p> Sub Category </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'style'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>style">
              <i class="material-icons">image</i>
              <p> Add Style </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'design'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>design">
              <i class="material-icons">image</i>
              <p> Add Design </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'product_t'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>product_t">
              <i class="material-icons">image</i>
              <p> Add Product </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment('1') == 'product_t_view'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url()?>product_t_view">
              <i class="material-icons">image</i>
              <p> View Product </p>
            </a>
          </li>
           <li class="nav-item <?php if($this->uri->segment('1') == 't_orders_admin'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url();?>t_orders_admin">
              <i class="material-icons">dashboard</i>
              <p> Orders </p>
            </a>
          </li>
          <?php } ?>

          <?php if($this->session->userdata('role') =='customer'){ ?>
          <li class="nav-item <?php if($this->uri->segment('1') == 't_orders'){ echo"active";} ?>">
            <a class="nav-link" href="<?php echo base_url();?>t_orders">
              <i class="material-icons">dashboard</i>
              <p> Orders </p>
            </a>
          </li>
          <?php } ?>

          
        </ul>
      </div>
    </div>