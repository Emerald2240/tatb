<h1 class="blog-name pt-lg-4 mb-0"><a href="index.php">TA Tech Blog</a></h1>

<nav class="navbar navbar-expand-lg navbar-dark">

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div id="navigation" class="collapse navbar-collapse flex-column">
		<div class="profile-section pt-3 pt-lg-0">
			<img class="profile-image mb-3 rounded-circle mx-auto" src="assets/images/mike.png" alt="image">

			<div class="bio mb-3">Hi, my name is Orji Michael Chukwuebuka. I'm a Computer Engineer and Software Developer.<br>My Job is quite simply to make the world a better place by solving problems.<br><a href="about.php">Find out more about me</a></div>
			<!--//bio-->
			<ul class="social-list list-inline py-3 mx-auto">
				<li class="list-inline-item"><a target="_blank" href="https://twitter.com/Michelson_Java"><i class="fab fa-twitter fa-fw"></i></a></li>
				<li class="list-inline-item"><a target="_blank" href="https://www.linkedin.com/in/michael-orji-1274b1220/"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
				<li class="list-inline-item"><a target="_blank" href="github.com/emerald2240"><i class="fab fa-github-alt fa-fw"></i></a></li>
				<li class="list-inline-item"><a target="_blank" href="#"><i class="fab fa-stack-overflow fa-fw"></i></a></li>
				<li class="list-inline-item"><a target="_blank" href="#"><i class="fab fa-codepen fa-fw"></i></a></li>
			</ul>
			<!--//social-list-->
			<hr>
		</div>
		<!--//profile-section-->

		<ul class="navbar-nav flex-column text-left">
			<li class="nav-item <?php
								if (strpos($_SERVER["PHP_SELF"], "index.php")) {
									echo 'active';
								}
								?>">
				<a class="nav-link" href="index.php"><i class="fas fa-home fa-fw mr-2"></i>Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item <?php
								if (strpos($_SERVER["PHP_SELF"], "blog-list.php")) {
									echo 'active';
								}
								?>">
				<a class="nav-link" href="blog-list.php?pag=10"><i class="fas fa-bookmark fa-fw mr-2"></i>Latest Posts</a>
			</li>
			<!-- <li class="nav-item">
					    <a class="nav-link" href="about.php"><i class="fas fa-user fa-fw mr-2"></i>About Me</a>
					</li> -->
		</ul>

		<div class="my-2 my-md-3">
			<a class="btn btn-primary" href="https://techac.net/contact.php" target="_blank">Get in Touch</a>
		</div>
	</div>
</nav>