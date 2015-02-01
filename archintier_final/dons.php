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
					    <li> <a href="news.php">News</a> </li>
					    <li class="active"> <a href="dons.php">Dons</a> </li>
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
			<div class="panel-body">
                <h1 style='text-align:center'>Les dons les plus généreux</h1><br>
                <?php
                    $arrayNames = [];
                    $arrayDons = [];
                    require("connectdb.php");
                    $query = "SELECT * FROM Users ORDER BY dons DESC";
                    if ($result = mysqli_query($link, $query)) {
                        for ($i = 0; $i < 10; $i++) {
                            if ($row = mysqli_fetch_assoc($result)) {
                                array_push($arrayNames, $row["login"]);
                                array_push($arrayDons, $row["dons"]);
                            }
                        }
                    }
                    mysqli_close($link) or die(mysqli_error($link));
                    
                    echo '<div class="col-xs-6">';
                    for ($i = 0; $i < count($arrayNames); $i++) {
                        echo "<p style='text-align:right'>".$arrayNames[$i]."</p>";
                    }
                    echo '</div>';
                    echo '<div class="col-xs-4 col-xs-offset-1">';
                    for ($i = 0; $i < count($arrayDons); $i++) {
                        echo "<p style='text-align:left'>".$arrayDons[$i]." €</p>";
                    }
                    echo '</div>';
                ?>
		        <br>
			</div>
			
			
			<?php
			    if($_SESSION['connecté']==1) {
			        echo '
                        <div class="panel-body">
                            <form role="form" action="sendDon.php" method="post">
                                <div class="col-lg-2 col-lg-offset-3">
                                    <div class="center">
                                        <h2>Faire un don (€)</h2>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <br>
                                    <div class="center">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quantite">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" name="quantite" class="form-control input-number" value="50" min="1" max="1000">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quantite">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Donner !</button>
                                </div>
                            </form>
                        </div>
	                ';
			    }
			?>
		    
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
	<script src="js/minusPlusButton.js"></script>
</html>
