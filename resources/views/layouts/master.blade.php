<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Ellatech</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="css/mystyles.css">
  





    <!-- Custom styles -->
    <link href="css/sree-code.css" rel="stylesheet" />
    <link href="css/sree-main.css" rel="stylesheet" />
    <style>
            html, body {
               
                background-image: url("images/pattern.png");
            }

          .card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
    background-color: #ffffff;
     /* background-color: #242ae726; */
    

}

.card-header {
  padding: 0.75rem 1.25rem;
  margin-bottom: 0;
  background-color: rgba(0, 0, 0, 0.03);
  border-bottom: 1px solid rgba(0, 0, 0, 0.125);
  /* background-color: #e76224; */
 background-color: #2b2d72;
} */
.justify-content-center {
    -webkit-box-pack: center !important;
    align-content: center;
    margin-top: 259px;
    -ms-flex-pack: center !important;
    justify-content: center !important;
}

      
        </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
            <img src="images/SREE-Logo.png" width="60" height="60" class="d-inline-block align-top" alt="">
          
          </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav ">
      <li class="nav-item">
      <router-link to="/dashboard" class="nav-link"> Home </router-link>
      </li>

      <?php $useridtousess = Auth::user()->id;
/// geting the users role
$myuserroledefined = DB::table('users')->where('id', $useridtousess)->value('mmaderole'); ?>
   
        
    <!-- Drop Down Start -->

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



      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  <?php echo $hname; ?></a>

        <div class="dropdown-menu" aria-labelledby="dropdown01">

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

          <router-link to="<?php echo $routelinkdd; ?>" class="dropdown-item">
          <p><?php echo $submname; ?></p>
          </router-link>
          <?php } //// ?>
          <?php } //// ?>
        </div>
      </li>
      <?php } 

     }
     ?>

    </ul>

  
<div class="col-md-3 ml-auto sree-notifications"> 
    <div class="row"> 
    <div class=" col-sm-2 notification-area">
<!--Messages-->

<div class="messages-menu notification-area">
        <!-- Menu toggle button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-envelope-open-text notif-icons"></i>
               <sup> <span class="badge badge-light notif-badge">4</span> </sup> 
        </a>

        <ul class="dropdown-menu sree-show">
          <li class="notif-header">You have 4 messages</li>
          <li>
            <!-- inner menu: contains the messages -->
            <ul class="menu sree-menu">
              <li><!-- start message -->
                <a href="#">

                <div class="row">  

                  <div class=" col-2 container-fluid">
                    <!-- User Image -->
                    <img src="images/SREE-Logo.png" class="img-circle" alt="User Image">
                  </div>
                  <!-- Message title and timestamp -->

                <div class=" col container sent-detials">

                    <div class="row"> 
                  <h4 class="sree-msg-title ">
                    Support Team
                 </h4>

                    <small class="ml-auto time-icon"> <i class="far fa-clock"></i> 5 mins ago </small>
                </div>

                    <!-- The message -->
                    <div class=" row notif-msg"> <p> Check out the New SREE Update Version 2.0 </p> </div>
                
                
                
                </div>

                     

                </div>  






               
                  
                </a>
              </li>
              <!-- end message -->
            </ul>

            <ul class="menu sree-menu">
                    <li><!-- start message -->
                      <a href="#">
      
                      <div class="row">  
      
                        <div class=" col-2 container-fluid">
                          <!-- User Image -->
                          <img src="images/SREE-Logo.png" class="img-circle" alt="User Image">
                        </div>
                        <!-- Message title and timestamp -->
      
                      <div class=" col container sent-detials">
      
                          <div class="row"> 
                        <h4 class="sree-msg-title ">
                          Chef Jevgeni
                       </h4>
      
                          <small class="ml-auto time-icon"> <i class="far fa-clock"></i> 5 mins ago </small>
                      </div>
      
                          <!-- The message -->
                          <div class=" row notif-msg"> <p> I'm excited about the performance of the new ... </p> </div>
                      
                      
                      
                      </div>
      
                           
      
                      </div>  
      
      
      
      
      
      
                     
                        
                      </a>
                    </li>
                    <!-- end message -->
                  </ul><ul class="menu sree-menu">
                        <li><!-- start message -->
                          <a href="#">
          
                          <div class="row">  
          
                            <div class=" col-2 container-fluid">
                              <!-- User Image -->
                              <img src="images/SREE-Logo.png" class="img-circle" alt="User Image">
                            </div>
                            <!-- Message title and timestamp -->
          
                          <div class=" col container sent-detials">
          
                              <div class="row"> 
                            <h4 class="sree-msg-title ">
                              Store Manager
                           </h4>
          
                              <small class="ml-auto time-icon"> <i class="far fa-clock"></i> 5 mins ago </small>
                          </div>
          
                              <!-- The message -->
                              <div class=" row notif-msg"> <p> Check out the New SREE Update Version 2.0 </p> </div>
                          
                          
                          
                          </div>
          
                               
          
                          </div>  
          
          
          
          
          
          
                         
                            
                          </a>
                        </li>
                        <!-- end message -->
                      </ul><ul class="menu sree-menu">
                            <li><!-- start message -->
                              <a href="#">
              
                              <div class="row">  
              
                                <div class=" col-2 container-fluid">
                                  <!-- User Image -->
                                  <img src="images/SREE-Logo.png" class="img-circle" alt="User Image">
                                </div>
                                <!-- Message title and timestamp -->
              
                              <div class=" col container sent-detials">
              
                                  <div class="row"> 
                                <h4 class="sree-msg-title ">
                                  F&amp;B Manager
                               </h4>
              
                                  <small class="ml-auto time-icon"> <i class="far fa-clock"></i> 5 mins ago </small>
                              </div>
              
                                  <!-- The message -->
                                  <div class=" row notif-msg"> <p> Check out the New SREE Update Version 2.0 </p> </div>
                              
                              
                              
                              </div>
              
                                   
              
                              </div>  
              
              
              
              
              
              
                             
                                
                              </a>
                            </li>
                            <!-- end message -->
                          </ul>
            <!-- /.menu -->
          </li>
          <li class="notif-footer"><a href="#">See All Messages</a></li>
        </ul>
    </div>





    </div>

    <div class="col-sm-2"> 
        <div class="messages-menu notification-area">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fas notif-icons fa-bell"></i>
                       <sup> <span class="badge badge-light notif-badge">6</span> </sup> 
                </a>
        
                <ul class="dropdown-menu sree-show">
                  <li class="notif-header">You have 6 Notifications</li>
                  <li>
        
                    <ul class="menu sree-menu">
                            <li class="one-not"><!-- start message -->
                            <a href="#">
                                <div class="row">    
                                    <div class="col-1 not-icon"> <i class="fas notif-icons-kitchen fa-bell"></i>  </div>

                                    <div class="col-10 not-descrip"> Pdt: 2340 - Heinkens Ketchup is reaching reorder value soon!. <small class="not-time">Just now</small> <br> <small class="not-seen-by"> <span class="seen-by"> Seen by: </span> Agnes, Grace, Solomon  </small> </div>
                                   
                                </div>
                            </a>
                            </li>

                            <li class="one-not"><!-- start message -->
                                <a href="#">
                                    <div class="row">    
                                        <div class="col-1 not-icon"> <i class="fas notif-icons-kitchen finance-not fas fa-chart-bar"> </i>  </div>
    
                                        <div class="col-10 not-descrip"> Invoice 4544 due for payment in 3 days. <small class="not-time"> 5 min ago</small> <br> <small class="not-seen-by"> <span class="seen-by"> Seen by: </span> Agnes, Grace, Solomon  </small> </div>

                         
    
                                    </div>
                                </a>
                                </li>

                                <li class="one-not"><!-- start message -->
                                    <a href="#">
                                        <div class="row">    
                                            <div class="col-1 not-icon"> <i class="fas notif-icons-kitchen delivery-not fa-shipping-fast"></i>  </div>
        
                                            <div class="col-10 not-descrip"> New online Kitchen Pilao order!.<small class="not-time"> 1 hour ago</small> <br> <small class="not-seen-by"><span class="seen-by"> Seen by: </span> Agnes, Grace, Solomon  </small> </div>

        
                                        </div>
                                    </a>
                                    </li>

                                    <li class="one-not"><!-- start message -->
                                        <a href="#">
                                            <div class="row">    
                                                <div class="col-1 not-icon"> <i class="fas notif-icons-kitchen fa-bell"></i>  </div>
            
                                                <div class="col-10 not-descrip"> Pdt: 2340 - Heinkens Ketchup is reaching reorder value soon!. <small class="not-time"> Just now </small> <br> <small class="not-seen-by"> <span class="seen-by"> Seen by: </span>  Agnes, Grace, Solomon  </small> </div>
                                         
            
                                            </div>
                                        </a>
                                        </li>
            
                                        <li class="one-not"><!-- start message -->
                                            <a href="#">
                                                <div class="row">    
                                                    <div class="col-1 not-icon"> <i class="fas notif-icons-kitchen finance-not fas fa-chart-bar"> </i>  </div>
                
                                                    <div class="col-10 not-descrip"> Invoice 4544 due for payment in 3 days. <small class="not-time"> 30 sec ago </small> <br> <small class="not-seen-by"> <span class="seen-by"> Seen by: </span> Agnes, Grace, Solomon  </small> </div>
                                                   
                
                                                </div>
                                            </a>
                                            </li>
            
                                            <li class="one-not"><!-- start message -->
                                                <a href="#">
                                                    <div class="row">    
                                                        <div class="col-1 not-icon"> <i class="fas notif-icons-kitchen delivery-not fa-shipping-fast"></i>  </div>
                    
                                                        <div class="col-10 not-descrip"> New online Kitchen Pilao order!. <small class="not-time"> Just now</small> <br> <small class="not-seen-by"> <span class="seen-by"> Seen by: </span> Agnes, Grace, Solomon  </small> </div>
                                                        
                    
                                                    </div>
                                                </a>
                                                </li>


                               
                  <li class="notif-footer"><a href="#">See All Notifications</a></li>
                </ul>
            </li></ul></div>
    
    
    </div>

    <div class="col-sm-2"> 
                
                <div class="messages-menu notification-area">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fas notif-icons fa-user"></i> 
                               
                        </a>
                
                        <ul class="dropdown-menu light-border sree-show">
                          
                          <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu sree-menu">
                              <li><!-- start message -->
                                <a href="#">
                
                                <div class="row">  
                
                                  <div class=" user-img-bg container col-11">
                                    <!-- User Image -->
                                    <img class="user-img" src="images/user.jpg" alt="User Image">
                                  </div>

                                  </div>
                                  <!-- Message title and timestamp -->
                                  <div class="row">
                                <div class=" col container sent-detials">
                
                                    <div class="row"> 
                                 
                                    <p class="user-name"> {{ Auth::user()->name }}  <br> <span class="user-title"> Admin </span> </p>
                                 
                
                                   
                                </div>
                
                                 
                                
                                
                                
                                </div>
                
                                     
                
                                </div>  
                
                
                
                
                
                
                               
                                  
                                </a>
                              </li>
                              <!-- end message -->
                            </ul>
                
                       
                            <!-- /.menu -->
                          </li>
                          <li class="user-footer">
                              <div class="row">
                                <div class="pull-left mx-auto">
                                  <a href="#" class="btn user-btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right mx-auto">
                                  <a  href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();" class="btn user-btn btn-default btn-flat">
                Sign out</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
                                </div>

                            </div>
                              </li>
                        </ul>
                    
                
                
                
                
                
                    </div>
    
    </div>



    <div class="col-sm-2"> <a href="#">  <i class="fas notif-icons fa-cogs"></i> </a> </div>
    <div class="col-sm-2"> <a href="#">  <i class="far notif-icons fa-comments"></i> </a> </div>

</div>
</div>
  </div>

  
</nav>


  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">

    
      <router-view></router-view>
      <vue-progress-bar></vue-progress-bar>   



      
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong> <a href="">E<sub>3</sub> Technologies</a>.</strong> Contact - +256704799173: Email :emusisi4@gmail.com.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>



<script src="/js/app.js"></script>
</body>
</html>
