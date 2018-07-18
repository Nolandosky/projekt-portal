<?php
require_once('../libaries/checkAccess.php');
require_once('../libaries/checkDatabase.php');

isNotLoggin();

 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Użytkownika - Wyślij Wiadomość</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->



                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">

                        <li><a href=""><i class="fa fa-gear fa-fw"></i>Ustawienia <i>( Niedostępne )</i></a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i>Wyloguj się</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div><?php echo $_SESSION['nick']?></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">

                        <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="account.php"><i class="fa fa-user fa-fw"></i> Twój Profil</a>
                    </li>
                     <li>
                        <a href="message.php"><i class="fa fa-comments fa-fw"></i> Wyślij Wiadomość</a>
                    </li>
                    <li>
                        <a href="alert.php"><i class="fa fa-warning fa-fw"></i> Zgłoś Błąd</a>
                    </li>

                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $_SESSION['imie']." ".$_SESSION['nazwisko']?></h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                <form class="form-horizontal" action="../libaries/getAlert.php" method="post">
                <fieldset>

                <!-- Form Name -->
                <legend></legend>

                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-2 control-label" for="Tytuł:">Tytuł Zgłoszenia:</label>
                  <div class="col-md-12">
                  <input id="Tytuł:" name="tytul" type="text" placeholder="Wpisz tytuł..." class="form-control input-md" required="">

                  </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                  <label class="col-md-1 control-label" for="tresc">Treść</label>
                  <div class="col-md-12">
                    <textarea class="form-control" id="tresc" name="tresc"></textarea>
                  </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                  <label class="col-md-1 control-label" for="wyslij"></label>
                  <div class="col-md-12">
                    <button id="wyslij" name="wyslij" class="btn btn-success">Wyślij</button>
                  </div>
                </div>

                </fieldset>
                </form>
                <span style="color: green;">
                  <?php
                  if(isset($_SESSION['info'])){
echo $_SESSION['info'];
unset($_SESSION['info']);
}  ?>
                </span>
                <!--end  Welcome -->
            </div>





    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>
