<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link href="public/css/style-custom.css" rel="stylesheet" />
        <!-- Bootstrap Core CSS -->
		<link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css">

		<!-- Fonts -->
		<link href="public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="public/css/animate.css" rel="stylesheet" />
		<!-- Squad theme CSS -->
		<link href="public/css/style.css" rel="stylesheet">
		<link href="public/color/default.css" rel="stylesheet">
    </head>
        
    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	  <!-- Preloader -->
	  <div id="preloader">
	    <div id="load"></div>
	  </div>

	  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
	    <div class="container">
	      <div class="navbar-header page-scroll">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
	                    <i class="fa fa-bars"></i>
	                </button>
	        <a class="navbar-brand" href="index.php">
	          <h1 id="main_title">Jean Forteroche</h1>
	        </a>
	      </div>

	      <!-- Collect the nav links, forms, and other content for toggling -->
	      <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
	        <ul class="nav navbar-nav">
	          <li class="active"><a href="index.php">Accueil</a></li>
	          <li class="dropdown">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Archives <b class="caret"></b></a>
	            <ul class="dropdown-menu">
	              <li><a href="#">Example menu</a></li>
	              <li><a href="#">Example menu</a></li>
	              <li><a href="#">Example menu</a></li>
	            </ul>
	          </li>
	          <li><a href="index.php?action=showSignIn">S'inscrire</a></li>
	          <li><a href="index.php?action=showContact">Contact</a></li>
	          <li><a href="index.php?action=showLog">Espace Admin</a></li>
	          
	        </ul>
	      </div>
	      <!-- /.navbar-collapse -->
	    </div>
	    <!-- /.container -->
	  </nav>

	  <!-- Section: intro -->
	  <section id="intro" class="intro">

	    <div class="slogan">
	      <h2>BILLET POUR<span class="text_color">L'ALASKA</span> </h2>
	      <h4>Le dernier roman de Jean Forteroche</h4><br />
	    </div>
	  </section>
	  <!-- /Section: intro -->
	  <!-- Section derniers billets -->

	  <section id="lastposts">
	    
	    <?= $content ?>


	  </section>
	  <!-- /Section Derniers billets -->

	  <footer id="footercolor">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12 col-lg-12">
	          <div class="wow shake" data-wow-delay="0.4s">
	            <div class="page-scroll marginbot-30">
	              <a href="#intro" id="totop" class="btn btn-circle">
					<i class="fa fa-angle-double-up animated"></i>
				  </a>
	            </div>
	          </div>
	          <p>&copy;SquadFREE. All rights reserved. <br /> Site réalisé dans le cadre d'une formation de développement web.
	          </p>
	          <div class="credits">
	            <!--
	              All the links in the footer should remain intact. 
	              You can delete the links only if you purchased the pro version.
	              Licensing information: https://bootstrapmade.com/license/
	              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Squadfree
	            -->
	            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
	          </div>
	        </div>
	      </div>
	    </div>
  	</footer>


          <!-- Core JavaScript Files -->
	<script src="public/js/jquery.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/js/jquery.easing.min.js"></script>
	<script src="public/js/jquery.scrollTo.js"></script>
	<script src="public/js/wow.min.js"></script>
	<!-- Custom Theme JavaScript -->
	<script src="public/js/custom.js"></script>
    </body>
</html>