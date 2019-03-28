<?php
session_start();
include 'Connection.php';
include 'controller/LoginController.php';
include 'controller/ShopController.php';

$login=new LoginController();
//when a user log in
if(isset($_POST['mail'])){
	$user=$login->getUser($_POST['mail']);
   if($user!="" && password_verify($_POST['pass'],$user->getPassword())){
	$_SESSION['mail']=$_POST['mail'];
	$_SESSION['nom']=$user->getNom();
	$_SESSION['prenom']=$user->getPrenom();
	$_SESSION['id']=$user->getId();
   }
}
//when an account is created
if(isset($_POST['name'])){
    $user=$login->createUser($_POST['name'],$_POST['fname'],$_POST['mailUp'],password_hash($_POST['passUp'],PASSWORD_BCRYPT));
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/custom.css" />
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>	 
<title>Shop</title>
</head>
<body>
	<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="/shop">
                        Shop
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(!isset($_SESSION['mail'])){ ?>
                            <li><a href="/shop">Login</a></li>
                            <li><a href="/shop" onclick="event.preventDefault();register();">Register</a></li>
                        <?php }else{ ?>
                            <li><a href="/shop">Neaby Shops</a></li>
                            <li><a href="/shop" onclick="preferred()">Preferred Shops</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="treatment.php" method="POST" style="display: none;">
                                            <input type="hidden" name="logout" value="logout" />
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
	<div class="container">
		
		
        <?php
         if(isset($_SESSION['mail'])){
            //if the user is logged
	       require 'view/mainPage.php';
        }else{
            //if the user is not logged
           require 'view/login-register.php';
        }
        ?>
	</div>

</body>
</html>