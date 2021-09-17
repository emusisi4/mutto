<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SenaHardware</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

      <!-- Bootstrap Core Css -->
      <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
      <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- Waves Effect Css -->
<link href="plugins/node-waves/waves.css" rel="stylesheet" />
<link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/side-bar.css" rel="stylesheet" />

<link href="css/bootstrap-theme.css" rel="stylesheet" />
<link rel="stylesheet" href="css/all.css">
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">


    <!-- Custom styles -->
    <link href="css/sree-code.css" rel="stylesheet" />
    <link href="css/sree-main.css" rel="stylesheet" />

<!-- Animation Css -->
<link href="plugins/animate-css/animate.css" rel="stylesheet" />

<!-- Colorpicker Css -->
<link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

<!-- Dropzone Css -->
<link href="plugins/dropzone/dropzone.css" rel="stylesheet">

<!-- Multi Select Css -->
<link href="plugins/multi-select/css/multi-select.css" rel="stylesheet">

<!-- Bootstrap Spinner Css -->
<link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

<!-- Bootstrap Tagsinput Css -->
<link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

<!-- Bootstrap Select Css -->
<link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<!-- noUISlider Css -->
<link href="plugins/nouislider/nouislider.min.css" rel="stylesheet" />

<!-- Custom Css -->
<link href="css/style.css" rel="stylesheet">
<link href="css/mystyle.css" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>




    <div class="container-fluid"  id="app">
    <!-- #END# Overlay For Sidebars -->
   
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand">SENA - Hardware Limited</a>
            </div>
                  </div>
    </nav>
    <!-- #Top Bar -->
    <section>

    
<div class="  p-0 navbar flex-column sree-nav navbar-expand-lg navbar-dark " role="navigation">
  


 

 

  <div class="position-absolute ml-0 bg-left"> <img src="images/bg-l.png"> </div>
  <div class="position-absolute mr-0 bg-right"> <img src="images/bg-r.png"> </div>
 

</div>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">


  


                    <router-link to="/dashboard"> 
                            <i class="material-icons">home</i>
                            <span> Dashboard </span></router-link>
                       
                    </li>
                   
                  
                    <?php $useridtousess = Auth::user()->id;
/// geting the users role
$myuserroledefined = DB::table('users')->where('id', $useridtousess)->value('mmaderole'); ?>     
    <?php 
/// selecting the allowed menues
$allowedmain  = DB::table('rolenaccmains')->where('roleto', $myuserroledefined)->get();
foreach ($allowedmain as $rowall)
{
     $component = ($rowall->component);

     $mainheaderssd = DB::table('mainmenucomponents')->where('id', $component)->get();

     foreach ($mainheaderssd as $myheaders)
     {
         $hname = ($myheaders->mainmenuname);
     
         $mainmenuno = ($myheaders->id);
         $classtoicon = ($myheaders->iconclass);
     /////

    //$shid = ($rowsubmenuesselection->shid);
    //$routelinkdd = ($rowsubmenuesselection->linkrouterre);


?>                
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons"><?php echo $classtoicon ?></i>
                            <span><?php echo $hname; ?></span>
                        </a>
                        <ul class="ml-menu">
                        <?php 
   //// woorking on the sub menues
   /// getting the logged in user role
   $lirole = Auth::user()->type;
   $allowedsubmenu  = DB::table('rolenaccsumbmens')->where('mainheader', $mainmenuno)->where('roleto', $myuserroledefined)->get();
foreach ($allowedsubmenu as $rowallsub)
{
     $componentvvvvbbb = ($rowallsub->component);
 $submenuesselection = DB::table('submheaders')->where('id',  $componentvvvvbbb)->orderBy('dorder', 'Asc')->get();
 foreach ($submenuesselection as $rowsubmenuesselection)
 {
     $submname = ($rowsubmenuesselection->submenuname);
 
     $shid = ($rowsubmenuesselection->shid);
     $routelinkdd = ($rowsubmenuesselection->linkrouterre);
 
  
  ?>
                        
                            <li>
                            <router-link to="<?php echo $routelinkdd; ?>" class="dropdown-item">
          <p><?php echo $submname; ?></p>
          </router-link>
          <?php } //// ?>
          <?php } //// ?>
                            </li>
                           
                        </ul>
                    </li>
                    <?php } 

}
?>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">3Ez - IT Solutions</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>

            <!-- #Footer -->
            <div class="position-absolute ml-0 bg-left"> <img src="images/bg-l.png"> </div>
            <div class="position-absolute mr-0 bg-right"> <img src="images/bg-r.png"> </div>
      
        </aside>
        <!-- #END# Left Sidebar -->
       
       
    </section>

    <section class="content">
  
    
    <!-- kkkkkkkkk -->
    
            <router-view></router-view>
<vue-progress-bar></vue-progress-bar> 
            </div>
    <!-- closing the App ID -->
           
           
      
    </section>

  

    <script src="/js/app.js"></script>
     <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="plugins/nouislider/nouislider.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/advanced-form-elements.js"></script>

    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>
</body>

</html>
