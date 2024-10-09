<?php include __DIR__ . "/partials/inicio-doc.parts.php"; ?>

<nav class="navbar navbar-fixed-top navbar-default">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a  class="navbar-brand page-scroll" href="#page-top">
<span>[PHOTO]</span>
</a>
</div>
<div class="collapse navbar-collapse navbar-right" id="menu">
<ul class="nav navbar-nav">
<li class=" lien"><a href="index.php"><i class="fa fa-home sr-icons"></i> Home</a></li>
<li class="lien"><a href="about.php"><i class="fa fa-bookmark sr-icons"></i> About</a></li>
<li class="lien"><a href="blog.php"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>
<li class="active"><a href="#"><i class="fa fa-phone-square sr-icons"></i> Contact</a></li>
</ul>
</div>
</div>
</nav>
<!-- End of Navigation Bar -->

<!-- Principal Content Start -->
<div id="contact">
	<div class="container">
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
			<h1>CONTACT US</h1>
			<hr>
			<p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
			<div class="<?php echo $claseDiv; ?>">
				<?php
				echo "<ul>";
				foreach ($errores as $error) {
				if (!empty($error)) {
				echo "<li>" . $error . "</li>";
				}
				}

				if (isset($mensajeExito)) {
				echo "<div>" . $mensajeExito . "</div>";
				}
				echo "</ul>";
				?>
			</div>
			<form action="<?= $_SERVER["PHP_SELF"] ?>" class="form-horizontal" method="post">
				<div class="form-group">
					<div class="col-xs-6">
						<label for="nombre" class="label-control">First Name</label>
						<input class="form-control" type="text" name="nombre" value="<?php echo $nombreFinal; ?>">
					</div>
					<div class="col-xs-6">
						<label for="apellidos" class="label-control">Last Name</label>
						<input class="form-control" type="text" name="apellidos" value="<?php echo $apellidosFinal; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label for="correo" class="label-control">Email</label>
						<input class="form-control" type="text" name="correo" value="<?php echo $correoFinal; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label for="subject" class="label-control">Subject</label>
						<input class="form-control" type="text" name="subject" value="<?php echo $subjectFinal; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label for="mensaje" class="label-control">Message</label>
						<textarea class="form-control" name="mensaje"><?php echo $mensajeFinal; ?></textarea>
						<input type="submit" class="pull-right btn btn-lg sr-button" value="SEND">
					</div>
				</div>
			</form>
			<hr class="divider">
			<div class="address">
				<h3>GET IN TOUCH</h3>
				<hr>
				<p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero.</p>
				<div class="ending text-center">
					<ul class="list-inline social-buttons">
						<li>
							<a href="#"><i class="fa fa-facebook sr-icons"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-twitter sr-icons"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-google-plus sr-icons"></i></a>
						</li>
					</ul>
					<ul class="list-inline contact">
						<li class="footer-number">
							<i class="fa fa-phone sr-icons"></i>  (00228)92229954 
						</li>
						<li>
							<i class="fa fa-envelope sr-icons"></i>  kouvenceslas93@gmail.com
						</li>
					</ul>
					<p>Photography Fanatic Template &copy; 2017</p>
				</div>
			</div>
		</div>   
	</div>
</div>
<?php include __DIR__ . "/partials/fin-doc.parts.php"; ?>