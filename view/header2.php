<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Data CIMM</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<!--<script src="js/jquery.easydropdown.js"></script>-->
<!--start slider -->
<link rel="stylesheet" href="css/fwslider.css" media="all">
<script src="js/jquery-ui.min.js"></script>
<script src="js/fwslider.js"></script>
<!--end slider -->
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
</head>
<body>
<div>
<?php
   /* require "config.php";
    require "model/conexion.php";
    $db = new conexion();
    $db->conectar();*/
?>
	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="menu">
						  <h2 ><a style="color:white; font-weight: 700; text-decoration:none;" href="?c=login&a=FormInicio"> Administrador <?= $_SESSION['user']['nombres'] .' ' .$_SESSION['user']['apellidos'] ?></a></h2>
							<script type="text/javascript" src="js/responsive-nav.js"></script> 
				    </div>							
	    		    <div class="clear"></div>
	    	    </div>
	            <div class="header_right">
	    		  						<!----//search-scripts---->
                   <!---- <a href="?c=login&a=FormLogin"> <img src="images/icono_login.png" alt="login" class="img-responsive"></a>---->
                    <ul class="icon1 sub-icon1 profile_img">
					 <li><a class="active-icon c1" href="#"> </a>
						<ul class="sub-icon1 list">
						  <div class="clear"></div>
						  <li class="list_img"><img src="images/icono_login.png" alt=""/></li>
						 <!---- <li class="list_desc"><h4><a href="#">Bienvenido/A</a></h4><span class="actual">1 x
                          $12.00</span></li>---->
                          <li class="list_desc"><?= $_SESSION['user']['nombres'] . ' ' . 	$_SESSION['user']['apellidos'] ?></li>
						  <div class="login_buttons">
							 <div class="check_button"><a href="?c=login&a=Destruir">Cerrar Sesión</a></div>
							 
							 <div class="login_button"><a href="?c=usuario&a=Ver">Mi Perfil</a></div>
							 
						  </div>
						  <div class="clear"></div>
						</ul>
					 </li>
				   </ul>
                </div>
	       </div>
	      </div>
		 </div>
	    </div>
	</div>
