<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
	    <meta charset="utf-8" />
        <link href="css/bootstrap.css" rel="stylesheet">
	    <link href="css/bootstrap-theme.css" rel="stylesheet">
    </head>

	<body>
		<div class="container.jumbotron">
		    <nav class="navbar navbar-inverse">
			    <div class="container-fluid">
				    <ul class="nav navbar-nav">
					    <li> <a href="index.php">Accueil</a> </li>
					    <li class="active"> <a href="news.php">News</a> </li>
					    <li> <a href="dons.php">Dons</a> </li>
				    </ul>
				    <form class="navbar-form pull-right">
			            <?php
			                if($_SESSION['connecté']==1) {
			                    echo "<a class='btn btn-lg btn-primary' data-toggle='modal' data-target='#myDecoModal'>Log out</a>";
			                }
			                else {
			                    echo "<a class='btn btn-lg btn-primary' data-toggle='modal' data-target='#myModal'>Log in</a>";
			                }
			            ?>
				    </form>
		        </div>
			</nav>
		    <div class="panel panel-default">
			    <div class="col-lg-10 col-lg-offset-1">
				    <a class="twitter-timeline" href="https://twitter.com/hashtag/Mortefange" data-widget-id="561830845963853824">Tweets sur #Mortefange</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		        </div>
	        </div>
		</div>
	</body>

	<!-- MODAL DE CONNEXION></!-->
	<div id="myModal" class="modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" action='signIn.php' method='post'>
                    <div class="modal-header">
					    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					    <h4 class="modal-title" id="myModalLabel">Log in</h4>
				    </div>
				    <div class="modal-body">
					    <input name="pseudo" type="text" style="width:150px" class="input-small" placeholder="Account name">
					    <input name="password" type="password" style="width:150px" class="input-small" placeholder="Password">
				    </div>
				    <div class="modal-footer">
					    <button type="button" class="btn btn-warning" data-dismiss="modal" data-toggle="modal" data-target="#signUpModal">Sign up</button>
					    <button type="submit" class="btn btn-primary">Log in</button>
				    </div>
				</form>
            </div>
        </div>
    </div>
	
	<!-- MODAL DE DECONNEXION></!-->
	<div id="myDecoModal" class="modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" action='logOut.php' method='post'>
                    <div class="modal-header">
					    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					    <h4 class="modal-title" id="myModalLabel">Log out</h4>
				    </div>
				    <div class="modal-footer">
					    <button type="submit" class="btn btn-primary">Log out</button>
				    </div>
				</form>
            </div>
        </div>
    </div>
	
	<!-- Modal sign up -->
	<div id="signUpModal" class="modal custom fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" action='signUp.php' method='post'>
                    <div class="modal-header">
					    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					    <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
				    </div>
				    <div class="modal-body">
					    <div class="col-md-5 col-md-offset-2">
						    <div class="panel-body">
							    <div class="form-group">
								    <label for="exampleInputEmail1">Login</label>
								    <input type="text" name="pseudo" class="form-control" id="exampleInputEmail1" placeholder="Enter login">
							    </div>
							    <div class="form-group">
								    <label for="exampleInputPassword1">Password</label>
								    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
							    </div>
							    <div class="form-group">
								    <label for="exampleInputPassword1">re-Password</label>
								    <input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="Enter password again">
							    </div>
						    </div>
						    
					    </div>
				    </div>
				    <div class="modal-footer">
	                    <button type="submit" class="btn btn-primary" id="sign_up_button">Sign up</button> 
	                </div>
				</form>
            </div>
        </div>
    </div>
	<!-- FIN MODAL -->
	
	<script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.js"></script>
</html>
