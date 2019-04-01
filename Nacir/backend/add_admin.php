<?php
    if (!empty($_POST)) {
        $Error = array();
require_once '../frontEnd/connexion.php';
        if (empty($_POST['name']) || !preg_match('/^[a-zA-Z_]+$/', $_POST['name'])) {
            $Error['name'] = "nom est invalide";
        }
        else{
            $req = $pdo->prepare('SELECT id_admin FROM admin WHERE name= ?');
            $req->execute([$_POST['name']]);
            $admin = $req->fetch();
            if ($admin) {
                
                $Error['name']= 'Ce pseudo existe déja';
            }
        }

        if (empty($_POST['address']) || !preg_match('/^[a-zA-Z_]+$/', $_POST['name']) ) {
            $Error['address'] = "address est invalide";
        }
       

        if (empty($_POST['phone']) || !preg_match('/^[0-9]+$/', $_POST['phone']) ) {
            $Error['phone'] = "phone est invalide";
        }else{
            $req = $pdo->prepare('SELECT id_admin FROM admin WHERE phone= ?');
            $req->execute([$_POST['phone']]);
            $admin = $req->fetch();
            if ($admin) {
                # code...
                $Error['phone']= 'Ce numéro existe déja';
            }
        }

       
        if (empty($_POST['email']) || !preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $_POST['email'])) {
            $Error['email'] = "email est invalide";
        }
        else{
            $req = $pdo->prepare('SELECT id_admin FROM admin WHERE email= ?');
            $req->execute([$_POST['email']]);
            $admin = $req->fetch();
            if ($admin) {
                # code...
                $Error['email']= 'Cet email existe déja';
            }
        }
        if (empty($_POST['password'])) {
            $Error['password'] = "password est vide";
        }

        if (empty($_POST['gender'])) {
            $Error['gender'] = "gender est vide";
        }

        if (empty($Error)) {
            $req = $pdo->prepare("INSERT INTO admin SET name = ?, address = ?, phone = ? , email= ?, password = ? , gender= ?");
            $req->execute([$_POST['name'], $_POST['address'], $_POST['phone'], $_POST['email'], $_POST['password'], $_POST['gender']]);
          // mail($_POST['email'], 'Confirmation de votre compte', "salut");
          
           header('location: listeAdmin.php');
            exit();
        }
    
}

?>
  

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>DASH<span>GAMER</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">0</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 0 pending tasks</p>
              </li>
              <li>
              </li>        
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">0</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 0 new messages</p>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">0</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 0 new notifications</p>
              </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.html">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/achref.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Game Club</h5>
          <li class="mt">
            <a  href="index.html">
              <i class="fa fa-dashboard"></i>
              <span>Acceuil</span>
              </a>
          </li>
          <li class="mt">
            <a href="stock.html">
              <i class="fa fa-cogs"></i>
              <span>Stock</span>
            </a>
          </li>
          <li class="mt">
            <a  href="utilisateur.php">
              <i class="fa fa-book""></i>
              <span>Utilisateur</span>
            </a>
          </li>
          <li class="mt">
            <a class="active" href="utilisateur.php">
              <i class="fa fa-book""></i>
              <span>ajouter les administrateurs</span>
            </a>
          </li>
           <li class="mt">
            <a  href="listeAdmin.php">
              <i class="fa fa-book""></i>
              <span>Liste des administrateurs</span>
            </a>
          </li>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    
    <section id="main-content">
      <section class="wrapper">
       <form method="post" action="add_admin.php" >
       <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Ajouter un administrateur</h4><hr><table class="table table-striped table-advance table-hover">
                <?php if(!empty($Error)): ?>
        <div class="alert alert-danger">
            <p> Vous n'avez pad rempli le formulaire correctement</p>
            <ul>
                <?php foreach($Error as $err): ?>
                    <li><?=$err; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif;  ?>
             
            <div class="preview text-center">

            <div class="form-group">
                <label>Admin Name:</label>
                <input class="form-control" type="text" name="name" required placeholder="Enter Admin Name"/>
                <span class="Error"></span>
            </div>
             <div class="form-group">
                <label>Address:</label>
                <input class="form-control" type="text" name="address" required placeholder="Enter Your Address"/>
                <span class="Error"></span>
            </div>
             <div class="form-group">
                <label>Phone Number:</label>
                <input class="form-control" type="text" name="phone" required placeholder="Enter Your Phone Number"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="text" name="email" required placeholder="Enter Your Email"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input class="form-control" type="password" name="password" required placeholder="Enter Password"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Gender:</label><br/>
                <label><input type="radio" name="gender" required value="Male"  /> Male</label>
                <label><input type="radio" name="gender" required value="Female" /> Female</label>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <input class="btn btn-primary " type="submit" name="Register" value="Register"/>
            </div>
        
      
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        </form>
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
   
    <!--footer end-->
  

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
 
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
   <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/batle.jpg", {
      speed: 1000
    });
  </script>
</body>

</html>